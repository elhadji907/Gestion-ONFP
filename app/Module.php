<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 08 Aug 2019 18:12:44 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Module
 * 
 * @property int $id
 * @property string $uuid
 * @property string $name
 * @property int $domaines_id
 * @property int $secteurs_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Domaine $domaine
 * @property \App\Secteur $secteur
 * @property \Illuminate\Database\Eloquent\Collection $demandes
 * @property \Illuminate\Database\Eloquent\Collection $operateurs
 *
 * @package App
 */
class Module extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'domaines_id' => 'int',
		'secteurs_id' => 'int'
	];

	protected $fillable = [
		'uuid',
		'name',
		'domaines_id',
		'secteurs_id'
	];

	public function domaine()
	{
		return $this->belongsTo(\App\Domaine::class, 'domaines_id');
	}

	public function secteur()
	{
		return $this->belongsTo(\App\Secteur::class, 'secteurs_id');
	}

	public function demandes()
	{
		return $this->belongsToMany(\App\Demande::class, 'demandes_has_modules', 'modules_id', 'demandes_id')
					->withPivot('deleted_at')
					->withTimestamps();
	}

	public function operateurs()
	{
		return $this->belongsToMany(\App\Operateur::class, 'modules_has_operateurs', 'modules_id', 'operateurs_id')
					->withPivot('deleted_at')
					->withTimestamps();
	}
}
