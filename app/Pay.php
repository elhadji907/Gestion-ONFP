<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 03 Oct 2019 11:32:17 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Pay
 * 
 * @property int $id
 * @property string $uuid
 * @property string $nom
 * @property int $users_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\User $user
 * @property \Illuminate\Database\Eloquent\Collection $regions
 *
 * @package App
 */
class Pay extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'users_id' => 'int'
	];

	protected $fillable = [
		'uuid',
		'nom',
		'users_id'
	];

	public function user()
	{
		return $this->belongsTo(\App\User::class, 'users_id');
	}

	public function regions()
	{
		return $this->hasMany(\App\Region::class, 'pays_id');
	}
}
