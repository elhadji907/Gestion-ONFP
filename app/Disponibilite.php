<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 04 Aug 2019 16:10:25 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Disponibilite
 * 
 * @property int $id
 * @property string $uuid
 * @property string $mois
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $demandes
 *
 * @package App
 */
class Disponibilite extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $fillable = [
		'uuid',
		'mois'
	];

	public function demandes()
	{
		return $this->belongsToMany(\App\Demande::class, 'demandes_has_disponibilites', 'disponibilites_id', 'demandes_id')
					->withPivot('deleted_at')
					->withTimestamps();
	}
}
