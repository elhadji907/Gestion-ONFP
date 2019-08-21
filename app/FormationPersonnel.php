<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 08 Aug 2019 18:12:44 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class FormationPersonnel
 * 
 * @property int $id
 * @property string $uuid
 * @property string $numero
 * @property string $theme
 * @property string $name
 * @property string $periode
 * @property \Carbon\Carbon $date_debut
 * @property \Carbon\Carbon $date_fin
 * @property string $cout
 * @property string $lieu
 * @property string $operateur
 * @property string $statut
 * @property string $observation
 * @property int $gestionnaires_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Gestionnaire $gestionnaire
 * @property \Illuminate\Database\Eloquent\Collection $employees
 *
 * @package App
 */
class FormationPersonnel extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'gestionnaires_id' => 'int'
	];

	protected $dates = [
		'date_debut',
		'date_fin'
	];

	protected $fillable = [
		'uuid',
		'numero',
		'theme',
		'name',
		'periode',
		'date_debut',
		'date_fin',
		'cout',
		'lieu',
		'operateur',
		'statut',
		'observation',
		'gestionnaires_id'
	];

	public function gestionnaire()
	{
		return $this->belongsTo(\App\Gestionnaire::class, 'gestionnaires_id');
	}

	public function employees()
	{
		return $this->belongsToMany(\App\Employee::class, 'employees_has_formation_personnels', 'formation_personnels_id', 'employees_id')
					->withPivot('deleted_at')
					->withTimestamps();
	}
}
