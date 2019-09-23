<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 11 Sep 2019 21:37:36 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
/**
 * Class User
 * 
 * @property int $id
 * @property string $uuid
 * @property string $firstname
 * @property string $name
 * @property string $username
 * @property string $email
 * @property string $telephone
 * @property \Carbon\Carbon $date_naissance
 * @property string $lieu_naissance
 * @property string $situation_familiale
 * @property \Carbon\Carbon $email_verified_at
 * @property string $password
 * @property int $roles_id
 * @property int $sexes_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Role $role
 * @property \App\Sex $sex
 * @property \Illuminate\Database\Eloquent\Collection $administrateurs
 * @property \Illuminate\Database\Eloquent\Collection $courriers
 * @property \Illuminate\Database\Eloquent\Collection $gestionnaires
 * @property \Illuminate\Database\Eloquent\Collection $pays
 * @property \Illuminate\Database\Eloquent\Collection $postes
 * @property \Illuminate\Database\Eloquent\Collection $profiles
 *
 * @package App
 */
class User extends Authenticatable
{
	
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;


	protected static function boot(){
		parent::boot();
		static::created(function ($user){
			$user->profile()->create([
				'titre'	=>	'',
				'description'	=>	'',
				'url'	=>	''
			]);
		});
	} 


	protected $casts = [
		'roles_id' => 'int',
		'sexes_id' => 'int'
	];

	protected $dates = [
		'date_naissance',
		'email_verified_at'
	];

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'uuid',
		'firstname',
		'name',
		'username',
		'email',
		'telephone',
		'date_naissance',
		'lieu_naissance',
		'situation_familiale',
		'email_verified_at',
		'password',
		'roles_id',
		'sexes_id'
	];
	
	public function getRouteKeyName(){
		return 'username';
	}


	public function role()
	{
		return $this->belongsTo(\App\Role::class, 'roles_id');
	}

	public function sex()
	{
		return $this->belongsTo(\App\Sex::class, 'sexes_id');
	}

	public function administrateur()
	{
		return $this->hasOne(\App\Administrateur::class, 'users_id');
	}

	public function courrier()
	{
		return $this->hasOne(\App\Courrier::class, 'users_id');
	}

	public function gestionnaire()
	{
		return $this->hasOne(\App\Gestionnaire::class, 'users_id');
	}

	public function pay()
	{
		return $this->hasOne(\App\Pay::class, 'users_id');
	}

	public function postes()
	{
		return $this->hasMany(\App\Poste::class, 'users_id');
	}

	public function profile()
	{
		return $this->hasOne(\App\Profile::class, 'users_id');
	}
}
