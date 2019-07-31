<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 31 Jul 2019 16:02:50 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Operateur
 * 
 * @property int $id
 * @property string $uuid
 * @property string $numero_agrement
 * @property int $administrateurs_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Administrateur $administrateur
 * @property \Illuminate\Database\Eloquent\Collection $agrements
 * @property \Illuminate\Database\Eloquent\Collection $domaines
 * @property \Illuminate\Database\Eloquent\Collection $formations
 * @property \Illuminate\Database\Eloquent\Collection $modules
 *
 * @package App
 */
class Operateur extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'administrateurs_id' => 'int'
	];

	protected $fillable = [
		'uuid',
		'numero_agrement',
		'administrateurs_id'
	];

	public function administrateur()
	{
		return $this->belongsTo(\App\Administrateur::class, 'administrateurs_id');
	}

	public function agrements()
	{
		return $this->hasMany(\App\Agrement::class, 'compteurs_id');
	}

	public function domaines()
	{
		return $this->belongsToMany(\App\Domaine::class, 'domaines_has_operateurs', 'operateurs_id', 'domaines_id')
					->withPivot('deleted_at')
					->withTimestamps();
	}

	public function formations()
	{
		return $this->hasMany(\App\Formation::class, 'compteurs_id');
	}

	public function modules()
	{
		return $this->belongsToMany(\App\Module::class, 'modules_has_operateurs', 'operateurs_id', 'modules_id')
					->withPivot('deleted_at')
					->withTimestamps();
	}
}
