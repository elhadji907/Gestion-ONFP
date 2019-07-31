<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 31 Jul 2019 16:02:50 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Formation
 * 
 * @property int $id
 * @property string $uuid
 * @property \Carbon\Carbon $date
 * @property string $valeur
 * @property int $compteurs_id
 * @property int $factures_id
 * @property int $agents_id
 * @property string $name
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Agent $agent
 * @property \App\Operateur $operateur
 * @property \App\Facture $facture
 * @property \Illuminate\Database\Eloquent\Collection $beneficiaires
 *
 * @package App
 */
class Formation extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'compteurs_id' => 'int',
		'factures_id' => 'int',
		'agents_id' => 'int'
	];

	protected $dates = [
		'date'
	];

	protected $fillable = [
		'uuid',
		'date',
		'valeur',
		'compteurs_id',
		'factures_id',
		'agents_id',
		'name'
	];

	public function agent()
	{
		return $this->belongsTo(\App\Agent::class, 'agents_id');
	}

	public function operateur()
	{
		return $this->belongsTo(\App\Operateur::class, 'compteurs_id');
	}

	public function facture()
	{
		return $this->belongsTo(\App\Facture::class, 'factures_id');
	}

	public function beneficiaires()
	{
		return $this->belongsToMany(\App\Beneficiaire::class, 'beneficiaires_has_formations', 'formations_id', 'beneficiaires_id')
					->withPivot('deleted_at')
					->withTimestamps();
	}
}
