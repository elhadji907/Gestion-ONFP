<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 04 Aug 2019 16:10:25 +0000.
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
 * @property string $telephone
 * @property string $email
 * @property \Carbon\Carbon $email_verified_at
 * @property string $password
 * @property int $roles_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Role $role
 * @property \Illuminate\Database\Eloquent\Collection $administrateurs
 * @property \Illuminate\Database\Eloquent\Collection $agents
 * @property \Illuminate\Database\Eloquent\Collection $beneficiaires
 * @property \Illuminate\Database\Eloquent\Collection $comptables
 * @property \Illuminate\Database\Eloquent\Collection $courriers
 * @property \Illuminate\Database\Eloquent\Collection $employees
 * @property \Illuminate\Database\Eloquent\Collection $gestionnaires
 * @property \Illuminate\Database\Eloquent\Collection $operateurs
 *
 * @package App
 */
class User extends Authenticatable
{
	use Notifiable;
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;

	protected $casts = [
		'roles_id' => 'int'
	];

	protected $dates = [
		'email_verified_at'
	];

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'uuid',
		'firstname',
		'name',
		'telephone',
		'email',
		'email_verified_at',
		'password',
		'roles_id'
	];

	public function role()
	{
		return $this->belongsTo(\App\Role::class, 'roles_id');
	}

	public function administrateurs()
	{
		return $this->hasMany(\App\Administrateur::class, 'users_id');
	}

	public function agents()
	{
		return $this->hasMany(\App\Agent::class, 'users_id');
	}

	public function beneficiaires()
	{
		return $this->hasMany(\App\Beneficiaire::class, 'users_id');
	}

	public function comptables()
	{
		return $this->hasMany(\App\Comptable::class, 'users_id');
	}

	public function courriers()
	{
		return $this->hasMany(\App\Courrier::class, 'users_id');
	}

	public function employees()
	{
		return $this->hasMany(\App\Employee::class, 'users_id');
	}

	public function gestionnaires()
	{
		return $this->hasMany(\App\Gestionnaire::class, 'users_id');
	}

	public function operateurs()
	{
		return $this->hasMany(\App\Operateur::class, 'users_id');
	}
}
