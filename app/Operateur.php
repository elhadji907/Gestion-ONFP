<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 08 Aug 2019 18:12:44 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Operateur
 * 
 * @property int $id
 * @property string $uuid
 * @property string $name
 * @property string $sigle
 * @property string $ninea
 * @property string $numero_agrement
 * @property int $administrateurs_id
 * @property int $communes_id
 * @property int $users_id
 * @property int $institutions_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Administrateur $administrateur
 * @property \App\Commune $commune
 * @property \App\Institution $institution
 * @property \App\User $user
 * @property \Illuminate\Database\Eloquent\Collection $agrements
 * @property \Illuminate\Database\Eloquent\Collection $domaines
 * @property \Illuminate\Database\Eloquent\Collection $modules
 * @property \Illuminate\Database\Eloquent\Collection $niveaux
 *
 * @package App
 */
class Operateur extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'administrateurs_id' => 'int',
		'communes_id' => 'int',
		'users_id' => 'int',
		'institutions_id' => 'int'
	];

	protected $fillable = [
		'uuid',
		'name',
		'sigle',
		'ninea',
		'numero_agrement',
		'administrateurs_id',
		'communes_id',
		'users_id',
		'institutions_id'
	];

	public function administrateur()
	{
		return $this->belongsTo(\App\Administrateur::class, 'administrateurs_id');
	}

	public function commune()
	{
		return $this->belongsTo(\App\Commune::class, 'communes_id');
	}

	public function institution()
	{
		return $this->belongsTo(\App\Institution::class, 'institutions_id');
	}

	public function user()
	{
		return $this->belongsTo(\App\User::class, 'users_id');
	}

	public function agrements()
	{
		return $this->hasMany(\App\Agrement::class, 'operateurs_id');
	}

	public function domaines()
	{
		return $this->belongsToMany(\App\Domaine::class, 'domaines_has_operateurs', 'operateurs_id', 'domaines_id')
					->withPivot('deleted_at')
					->withTimestamps();
	}

	public function modules()
	{
		return $this->belongsToMany(\App\Module::class, 'modules_has_operateurs', 'operateurs_id', 'modules_id')
					->withPivot('deleted_at')
					->withTimestamps();
	}

	public function niveaux()
	{
		return $this->belongsToMany(\App\Niveau::class, 'operateurs_has_niveaux', 'operateurs_id', 'niveaux_id')
					->withPivot('deleted_at')
					->withTimestamps();
	}
}
