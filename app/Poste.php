<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 01 Sep 2019 00:00:38 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Poste
 * 
 * @property int $id
 * @property string $uuid
 * @property string $legende
 * @property string $image
 * @property int $users_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\User $user
 *
 * @package App
 */
class Poste extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;

	protected $casts = [
		'users_id' => 'int'
	];

	protected $guarded = [];

	protected $fillable = [
		'uuid',
		'legende',
		'image',
		'users_id'
	];

	public function user()
	{
		return $this->belongsTo(\App\User::class, 'users_id');
	}
}
