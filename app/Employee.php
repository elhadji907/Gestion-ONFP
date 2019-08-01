<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 01 Aug 2019 09:51:34 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Employee
 * 
 * @property int $id
 * @property string $uuid
 * @property string $matricule
 * @property string $cin
 * @property int $users_id
 * @property int $quartier_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Quartier $quartier
 * @property \App\User $user
 *
 * @package App
 */
class Employee extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'users_id' => 'int',
		'quartier_id' => 'int'
	];

	protected $fillable = [
		'uuid',
		'matricule',
		'cin',
		'users_id',
		'quartier_id'
	];

	public function quartier()
	{
		return $this->belongsTo(\App\Quartier::class);
	}

	public function user()
	{
		return $this->belongsTo(\App\User::class, 'users_id');
	}
}
