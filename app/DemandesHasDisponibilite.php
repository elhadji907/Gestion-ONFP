<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 04 Aug 2019 16:10:25 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class DemandesHasDisponibilite
 * 
 * @property int $demandes_id
 * @property int $disponibilites_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Demande $demande
 * @property \App\Disponibilite $disponibilite
 *
 * @package App
 */
class DemandesHasDisponibilite extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	protected $primaryKey = 'demandes_id';

	protected $casts = [
		'disponibilites_id' => 'int'
	];

	protected $fillable = [
		'disponibilites_id'
	];

	public function demande()
	{
		return $this->belongsTo(\App\Demande::class, 'demandes_id');
	}

	public function disponibilite()
	{
		return $this->belongsTo(\App\Disponibilite::class, 'disponibilites_id');
	}
}
