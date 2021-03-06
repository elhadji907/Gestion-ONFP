<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 03 Oct 2019 11:32:17 +0000.
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
}
