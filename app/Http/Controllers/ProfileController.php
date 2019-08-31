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
}
