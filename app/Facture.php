<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 04 Aug 2019 16:10:25 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Facture
 * 
 * @property int $id
 * @property string $uuid
 * @property string $numero
 * @property \Carbon\Carbon $date_etablissement
 * @property string $details
 * @property float $montant
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
		'date_etablissement'
	];

	protected $fillable = [
		'uuid',
		'numero',
		'date_etablissement',
		'details',
		'montant'
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
