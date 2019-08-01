<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 01 Aug 2019 09:51:34 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Commune
 * 
 * @property int $id
 * @property string $uuid
 * @property string $nom
 * @property int $arrondissements_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Arrondissement $arrondissement
 * @property \Illuminate\Database\Eloquent\Collection $quartiers
 * @property \Illuminate\Database\Eloquent\Collection $villages
 *
 * @package App
 */
class Commune extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'arrondissements_id' => 'int'
	];

	protected $fillable = [
		'uuid',
		'nom',
		'arrondissements_id'
	];

	public function arrondissement()
	{
		return $this->belongsTo(\App\Arrondissement::class, 'arrondissements_id');
	}

	public function quartiers()
	{
		return $this->hasMany(\App\Quartier::class, 'communes_id');
	}

	public function villages()
	{
		return $this->hasMany(\App\Village::class, 'communes_id');
	}
}
