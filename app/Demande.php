<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 04 Aug 2019 16:10:25 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Demande
 * 
 * @property int $id
 * @property string $uuid
 * @property string $name
 * @property int $lieux_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Lieux $lieux
 * @property \Illuminate\Database\Eloquent\Collection $disponibilites
 * @property \Illuminate\Database\Eloquent\Collection $modules
 * @property \Illuminate\Database\Eloquent\Collection $formations
 *
 * @package App
 */
class Demande extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'lieux_id' => 'int'
	];

	protected $fillable = [
		'uuid',
		'name',
		'lieux_id'
	];

	public function lieux()
	{
		return $this->belongsTo(\App\Lieux::class);
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

	public function formations()
	{
		return $this->hasMany(\App\Formation::class, 'demandes_id');
	}
}
