<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 31 Jul 2019 16:02:50 +0000.
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
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Domaine $domaine
 * @property \Illuminate\Database\Eloquent\Collection $operateurs
 *
 * @package App
 */
class Module extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'domaines_id' => 'int'
	];

	protected $fillable = [
		'uuid',
		'name',
		'domaines_id'
	];

	public function domaine()
	{
		return $this->belongsTo(\App\Domaine::class, 'domaines_id');
	}

	public function operateurs()
	{
		return $this->belongsToMany(\App\Operateur::class, 'modules_has_operateurs', 'modules_id', 'operateurs_id')
					->withPivot('deleted_at')
					->withTimestamps();
	}
}
