<?php
namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    public function show(User $user){
        //dd($user);
        //dd($user->profile);
        
        return view('profiles.show', compact('user'));
    }


    public function edit(User $user)
    {
        //dd($user);        
        $this->authorize('update', $user->profile);
        return view('profiles.edit', compact('user'));
    }


    public function update(User $user)
    {
        $this->authorize('update', $user->profile);
        $data = request()->validate([
            'firstname'        =>  'required|string|max:50',
            'name'             =>  'required|string|max:50',
            'date_naissance'   =>  'required|date',
            'lieu_naissance'   =>  'required|string|max:50',
            'telephone'        =>  'required|string|max:50',
            'sexe'             =>  'required|string|max:50',
            'image'            =>  'sometimes|image|max:3000'

        ]);

  /*       if (request('image')) {            
            $imagePath = request('image')->store('avatars', 'public');
            $image = Image::make(public_path("/storage/{$imagePath}"))->fit(800, 800);
            
            $image->save();

            auth()->user()->profile->update(array_merge(
                $data,
                ['image' => $imagePath]
            ));
        } 
        else {
            auth()->user()->profile->update($data);
        }

        return redirect()->route('profiles.show', ['user' => $user]); */

        if (request('image')) {   
        $imagePath = request('image')->store('avatars', 'public');

        $image = Image::make(public_path("/storage/{$imagePath}"))->fit(800, 800);
        $image->save();

           auth()->user()->profile->update([
            'image' => $imagePath
            ]);

            auth()->user()->update([
            'firstname' => $data['firstname'],
            'name' => $data['name'],
            'date_naissance' => $data['date_naissance'],
            'lieu_naissance' => $data['lieu_naissance'],
            'telephone' => $data['telephone'],
            'sexe' => $data['sexe']
            ]);

        }  else {
            auth()->user()->profile->update($data);

            auth()->user()->update([
                'firstname' => $data['firstname'],
                'name' => $data['name'],
                'date_naissance' => $data['date_naissance'],
                'lieu_naissance' => $data['lieu_naissance'],
                'telephone' => $data['telephone'],
                'sexe' => $data['sexe']
                ]);
        }

        return redirect()->route('profiles.show', ['user'=>auth()->user()]);
    }
}
