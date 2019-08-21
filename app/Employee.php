<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 08 Aug 2019 18:12:44 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Employee
 * 
 * @property int $id
 * @property string $uuid
 * @property string $matricule
 * @property string $cin
 * @property \Carbon\Carbon $date_embauche
 * @property string $classification
 * @property string $categorie_salaire
 * @property int $users_id
 * @property int $quartier_id
 * @property int $categories_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Category $category
 * @property \App\Quartier $quartier
 * @property \App\User $user
 * @property \Illuminate\Database\Eloquent\Collection $courriers
 * @property \Illuminate\Database\Eloquent\Collection $formation_personnels
 * @property \Illuminate\Database\Eloquent\Collection $missions
 *
 * @package App
 */
class Employee extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'users_id' => 'int',
		'quartier_id' => 'int',
		'categories_id' => 'int'
	];

	protected $dates = [
		'date_embauche'
	];

	protected $fillable = [
		'uuid',
		'matricule',
		'cin',
		'date_embauche',
		'classification',
		'categorie_salaire',
		'users_id',
		'quartier_id',
		'categories_id'
	];

	public function category()
	{
		return $this->belongsTo(\App\Category::class, 'categories_id');
	}

	public function quartier()
	{
		return $this->belongsTo(\App\Quartier::class);
	}

	public function user()
	{
		return $this->belongsTo(\App\User::class, 'users_id');
	}

	public function courriers()
	{
		return $this->hasMany(\App\Courrier::class, 'employees_id');
	}

	public function formation_personnels()
	{
		return $this->belongsToMany(\App\FormationPersonnel::class, 'employees_has_formation_personnels', 'employees_id', 'formation_personnels_id')
					->withPivot('deleted_at')
					->withTimestamps();
	}

	public function missions()
	{
		return $this->belongsToMany(\App\Mission::class, 'missions_has_employees', 'employees_id', 'missions_id')
					->withPivot('deleted_at')
					->withTimestamps();
	}
}
