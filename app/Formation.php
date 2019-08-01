<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 01 Aug 2019 09:51:34 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Formation
 * 
 * @property int $id
 * @property string $uuid
 * @property int $code
 * @property string $name
 * @property string $numero
 * @property \Carbon\Carbon $date
 * @property string $valeur
 * @property int $compteurs_id
 * @property int $factures_id
 * @property int $agents_id
 * @property int $detfs_id
 * @property int $conventions_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Agent $agent
 * @property \App\Operateur $operateur
 * @property \App\Facture $facture
 * @property \App\Convention $convention
 * @property \App\Detf $detf
 * @property \Illuminate\Database\Eloquent\Collection $beneficiaires
 *
 * @package App
 */
class Formation extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'code' => 'int',
		'compteurs_id' => 'int',
		'factures_id' => 'int',
		'agents_id' => 'int',
		'detfs_id' => 'int',
		'conventions_id' => 'int'
	];

	protected $dates = [
		'date'
	];

	protected $fillable = [
		'uuid',
		'code',
		'name',
		'numero',
		'date',
		'valeur',
		'compteurs_id',
		'factures_id',
		'agents_id',
		'detfs_id',
		'conventions_id'
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

	public function convention()
	{
		return $this->belongsTo(\App\Convention::class, 'conventions_id');
	}

	public function detf()
	{
		return $this->belongsTo(\App\Detf::class, 'detfs_id');
	}

	public function beneficiaires()
	{
		return $this->belongsToMany(\App\Beneficiaire::class, 'beneficiaires_has_formations', 'formations_id', 'beneficiaires_id')
					->withPivot('deleted_at')
					->withTimestamps();
	}
}
