<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 31 Jul 2019 16:02:50 +0000.
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
	use \Illuminate\Database\Eloquent\SoftDeletes;

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
