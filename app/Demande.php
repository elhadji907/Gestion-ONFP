<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 08 Aug 2019 18:12:44 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Demande
 * 
 * @property int $id
 * @property string $uuid
 * @property string $domaine
 * @property string $module
 * @property string $situation_professionnelle
 * @property string $institution
 * @property string $niveau_etude
 * @property string $diplome
 * @property string $qualification
 * @property string $experience
 * @property string $deja_forme
 * @property string $pre_requis
 * @property string $projet
 * @property int $lieux_id
 * @property int $users_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Lieux $lieux
 * @property \App\User $user
 * @property \Illuminate\Database\Eloquent\Collection $disponibilites
 * @property \Illuminate\Database\Eloquent\Collection $modules
 * @property \Illuminate\Database\Eloquent\Collection $domaines
 * @property \Illuminate\Database\Eloquent\Collection $formations
 *
 * @package App
 */
class Demande extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'lieux_id' => 'int',
		'users_id' => 'int'
	];

	protected $fillable = [
		'uuid',
		'domaine',
		'module',
		'situation_professionnelle',
		'institution',
		'niveau_etude',
		'diplome',
		'qualification',
		'experience',
		'deja_forme',
		'pre_requis',
		'projet',
		'lieux_id',
		'users_id'
	];

	public function lieux()
	{
		return $this->belongsTo(\App\Lieux::class);
	}

	public function user()
	{
		return $this->belongsTo(\App\User::class, 'users_id');
	}

	public function disponibilites()
	{
		return $this->belongsToMany(\App\Disponibilite::class, 'demandes_has_disponibilites', 'demandes_id', 'disponibilites_id')
					->withPivot('deleted_at')
					->withTimestamps();
	}

	public function modules()
	{
		return $this->belongsToMany(\App\Module::class, 'demandes_has_modules', 'demandes_id', 'modules_id')
					->withPivot('deleted_at')
					->withTimestamps();
	}

	public function domaines()
	{
		return $this->belongsToMany(\App\Domaine::class, 'domaines_has_demandes', 'demandes_id', 'domaines_id')
					->withPivot('deleted_at')
					->withTimestamps();
	}

	public function formations()
	{
		return $this->hasMany(\App\Formation::class, 'demandes_id');
	}
}
