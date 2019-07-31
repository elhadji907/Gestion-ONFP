<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 31 Jul 2019 16:40:19 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;
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
 * @property string $telephone
 * @property string $email
 * @property \Carbon\Carbon $email_verified_at
 * @property string $password
 * @property int $roles_id
 * @property string $remember_token
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Role $role
 * @property \Illuminate\Database\Eloquent\Collection $administrateurs
 * @property \Illuminate\Database\Eloquent\Collection $agents
 * @property \Illuminate\Database\Eloquent\Collection $beneficiaires
 * @property \Illuminate\Database\Eloquent\Collection $comptables
 * @property \Illuminate\Database\Eloquent\Collection $gestionnaires
 *
 * @package App
 */
class User extends Authenticatable
{
	use Notifiable;
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;

	protected $casts = [
		'email_verified_at' => 'datetime',
		'roles_id' => 'int',
	];

	/* protected $dates = [
		'email_verified_at'
	]; */

	protected $hidden = [
		'password',
		'remember_token'
	];

	protected $fillable = [
		'uuid',
		'firstname',
		'name',
		'telephone',
		'email',
		'email_verified_at',
		'password',
		'roles_id',
		'remember_token'
	];

	public function role()
	{
		return $this->belongsTo(\App\Role::class, 'roles_id');
	}

	public function administrateurs()
	{
		return $this->hasOne(\App\Administrateur::class, 'users_id');
	}

	public function agents()
	{
		return $this->hasOne(\App\Agent::class, 'users_id');
	}

	public function beneficiaires()
	{
		return $this->hasOne(\App\Beneficiaire::class, 'users_id');
	}

	public function comptables()
	{
		return $this->hasOne(\App\Comptable::class, 'users_id');
	}

	public function gestionnaires()
	{
		return $this->hasOne(\App\Gestionnaire::class, 'users_id');
	}
}
