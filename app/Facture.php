<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 01 Aug 2019 09:51:34 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Facture
 * 
 * @property int $id
 * @property string $uuid
 * @property \Carbon\Carbon $date_limite
 * @property string $details
 * @property float $montant
 * @property \Carbon\Carbon $debut_consommation
 * @property \Carbon\Carbon $fin_consommation
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $formations
 * @property \Illuminate\Database\Eloquent\Collection $reglements
 *
 * @package App
 */
class Facture extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;use \App\Helpers\UuidForKey;

	protected $casts = [
		'montant' => 'float'
	];

	protected $dates = [
		'date_limite',
		'debut_consommation',
		'fin_consommation'
	];

	protected $fillable = [
		'uuid',
		'date_limite',
		'details',
		'montant',
		'debut_consommation',
		'fin_consommation'
	];

	public function formations()
	{
		return $this->hasMany(\App\Formation::class, 'factures_id');
	}

	public function reglements()
	{
		return $this->hasMany(\App\Reglement::class, 'factures_id');
	}
}
