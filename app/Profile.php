<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 30 Aug 2019 16:00:14 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Profile
 * 
 * @property int $id
 * @property string $uuid
 * @property string $titre
 * @property string $description
 * @property string $url
 * @property int $users_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\User $user
 *
 * @package App
 */
class Profile extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;

	protected $casts = [
		'users_id' => 'int'
	];

	protected $fillable = [
		'uuid',
		'titre',
		'description',
		'url',
		'users_id'
	];

	public function user()
	{
		return $this->belongsTo('\App\User');
	}
}
