<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 11 Sep 2019 21:37:36 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Courrier
 * 
 * @property int $id
 * @property string $uuid
 * @property string $numero
 * @property string $name
 * @property string $types
 * @property string $message
 * @property string $destinataire
 * @property string $fichier
 * @property string $statut
 * @property \Carbon\Carbon $date
 * @property int $gestionnaires_id
 * @property int $users_id
 * @property int $types_courriers_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Gestionnaire $gestionnaire
 * @property \App\TypesCourrier $types_courrier
 * @property \App\User $user
 * @property \Illuminate\Database\Eloquent\Collection $arrives
 * @property \Illuminate\Database\Eloquent\Collection $departs
 * @property \Illuminate\Database\Eloquent\Collection $internes
 *
 * @package App
 */
class Courrier extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;

	protected $casts = [
		'gestionnaires_id' => 'int',
		'users_id' => 'int',
		'types_courriers_id' => 'int'
	];

	protected $dates = [
		'date'
	];

	protected $fillable = [
		'uuid',
		'numero',
		'name',
		'types',
		'message',
		'destinataire',
		'fichier',
		'statut',
		'date',
		'gestionnaires_id',
		'users_id',
		'types_courriers_id'
	];

	public function gestionnaire()
	{
		return $this->belongsTo(\App\Gestionnaire::class, 'gestionnaires_id');
	}

	public function types_courrier()
	{
		return $this->belongsTo(\App\TypesCourrier::class, 'types_courriers_id');
	}

	public function user()
	{
		return $this->belongsTo(\App\User::class, 'users_id');
	}

	public function arrives()
	{
		return $this->hasMany(\App\Arrife::class, 'courriers_id');
	}

	public function departs()
	{
		return $this->hasMany(\App\Depart::class, 'courriers_id');
	}

	public function internes()
	{
		return $this->hasMany(\App\Interne::class, 'courriers_id');
	}
}
