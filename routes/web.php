<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/table', function () {
    return view('layout.tables');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/accueil', function () {
        return view('layout.default');
});

Route::get('profiles/{user}', 'ProfileController@show')->name('profiles.show');




 //gestion des roles par niveau d'autorisation
 Route::get('loginfor/{rolename?}',function($rolename=null){
    if(!isset($rolename)){
        return view('auth.loginfor');
    }else{
        $role=App\Role::where('name',$rolename)->first();
        if($role){
            $user=$role->users()->first();
            Auth::login($user,true);
            return redirect()->route('home');
        }
    }
    return redirect()->route('login');
    })->name('loginfor');