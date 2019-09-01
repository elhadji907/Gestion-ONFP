<?php
namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

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
            'titre'   =>  'required',
            'description'   =>  'required',
            'url'   =>  'required|url'

        ]);

        auth()->$user->profile->update($data);
        return redirect()->route('profiles.show', ['user' => $user]);
    }
}
