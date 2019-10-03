<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 03 Oct 2019 11:32:17 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Quartier
 * 
 * @property int $id
 * @property string $uuid
 * @property string $nom
 * @property int $chef_id
 * @property int $communes_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Commune $commune
 *
 * @package App
 */
class Quartier extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'chef_id' => 'int',
		'communes_id' => 'int'
	];

	protected $fillable = [
		'uuid',
		'nom',
		'chef_id',
		'communes_id'
	];

	public function commune()
	{
		return $this->belongsTo(\App\Commune::class, 'communes_id');
	}
}
