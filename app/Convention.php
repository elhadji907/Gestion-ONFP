<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 04 Aug 2019 16:10:25 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Convention
 * 
 * @property int $id
 * @property string $uuid
 * @property string $numero
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $formations
 *
 * @package App
 */
class Convention extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $fillable = [
		'uuid',
		'numero'
	];

	public function formations()
	{
		return $this->hasMany(\App\Formation::class, 'conventions_id');
	}
}
