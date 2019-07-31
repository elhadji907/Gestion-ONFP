<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 31 Jul 2019 16:02:50 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Domaine
 * 
 * @property int $id
 * @property string $uuid
 * @property string $name
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $operateurs
 * @property \Illuminate\Database\Eloquent\Collection $modules
 *
 * @package App
 */
class Domaine extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $fillable = [
		'uuid',
		'name'
	];

	public function operateurs()
	{
		return $this->belongsToMany(\App\Operateur::class, 'domaines_has_operateurs', 'domaines_id', 'operateurs_id')
					->withPivot('deleted_at')
					->withTimestamps();
	}

	public function modules()
	{
		return $this->hasMany(\App\Module::class, 'domaines_id');
	}
}
