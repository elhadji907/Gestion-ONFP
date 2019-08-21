<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 08 Aug 2019 18:12:44 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class AgrementsType
 * 
 * @property int $id
 * @property string $uuid
 * @property string $name
 * @property int $agrements_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Agrement $agrement
 *
 * @package App
 */
class AgrementsType extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'agrements_id' => 'int'
	];

	protected $fillable = [
		'uuid',
		'name',
		'agrements_id'
	];

	public function agrement()
	{
		return $this->belongsTo(\App\Agrement::class, 'agrements_id');
	}
}
