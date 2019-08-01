<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 01 Aug 2019 09:51:34 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Type
 * 
 * @property int $id
 * @property string $uuid
 * @property string $name
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $reglements
 *
 * @package App
 */
class Type extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $fillable = [
		'uuid',
		'name'
	];

	public function reglements()
	{
		return $this->hasMany(\App\Reglement::class, 'types_id');
	}
}
