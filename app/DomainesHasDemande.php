<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 08 Aug 2019 18:12:44 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class DomainesHasDemande
 * 
 * @property int $domaines_id
 * @property int $demandes_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Demande $demande
 * @property \App\Domaine $domaine
 *
 * @package App
 */
class DomainesHasDemande extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	protected $primaryKey = 'domaines_id';

	protected $casts = [
		'demandes_id' => 'int'
	];

	protected $fillable = [
		'demandes_id'
	];

	public function demande()
	{
		return $this->belongsTo(\App\Demande::class, 'demandes_id');
	}

	public function domaine()
	{
		return $this->belongsTo(\App\Domaine::class, 'domaines_id');
	}
}
