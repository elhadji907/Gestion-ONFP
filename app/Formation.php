<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 08 Aug 2019 18:12:44 +0000.
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
 * @property string $effectif_total
 * @property \Carbon\Carbon $date_pv
 * @property \Carbon\Carbon $date_debut
 * @property \Carbon\Carbon $date_fin
 * @property int $factures_id
 * @property int $agents_id
 * @property int $detfs_id
 * @property int $conventions_id
 * @property int $demandes_id
 * @property int $nivaux_id
 * @property int $programmes_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Agent $agent
 * @property \App\Facture $facture
 * @property \App\Convention $convention
 * @property \App\Demande $demande
 * @property \App\Detf $detf
 * @property \App\Niveau $niveau
 * @property \App\Programme $programme
 * @property \Illuminate\Database\Eloquent\Collection $attestations
 * @property \Illuminate\Database\Eloquent\Collection $beneficiaires
 * @property \Illuminate\Database\Eloquent\Collection $evaluations
 * @property \Illuminate\Database\Eloquent\Collection $titres
 *
 * @package App
 */
class Formation extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'code' => 'int',
		'factures_id' => 'int',
		'agents_id' => 'int',
		'detfs_id' => 'int',
		'conventions_id' => 'int',
		'demandes_id' => 'int',
		'nivaux_id' => 'int',
		'programmes_id' => 'int'
	];

	protected $dates = [
		'date_pv',
		'date_debut',
		'date_fin'
	];

	protected $fillable = [
		'uuid',
		'code',
		'name',
		'effectif_total',
		'date_pv',
		'date_debut',
		'date_fin',
		'factures_id',
		'agents_id',
		'detfs_id',
		'conventions_id',
		'demandes_id',
		'nivaux_id',
		'programmes_id'
	];

	public function agent()
	{
		return $this->belongsTo(\App\Agent::class, 'agents_id');
	}

	public function facture()
	{
		return $this->belongsTo(\App\Facture::class, 'factures_id');
	}

	public function convention()
	{
		return $this->belongsTo(\App\Convention::class, 'conventions_id');
	}

	public function demande()
	{
		return $this->belongsTo(\App\Demande::class, 'demandes_id');
	}

	public function detf()
	{
		return $this->belongsTo(\App\Detf::class, 'detfs_id');
	}

	public function niveau()
	{
		return $this->belongsTo(\App\Niveau::class, 'nivaux_id');
	}

	public function programme()
	{
		return $this->belongsTo(\App\Programme::class, 'programmes_id');
	}

	public function attestations()
	{
		return $this->hasMany(\App\Attestation::class, 'formations_id');
	}

	public function beneficiaires()
	{
		return $this->belongsToMany(\App\Beneficiaire::class, 'beneficiaires_has_formations', 'formations_id', 'beneficiaires_id')
					->withPivot('deleted_at')
					->withTimestamps();
	}

	public function evaluations()
	{
		return $this->hasMany(\App\Evaluation::class, 'formations_id');
	}

	public function titres()
	{
		return $this->hasMany(\App\Titre::class, 'formations_id');
	}
}
