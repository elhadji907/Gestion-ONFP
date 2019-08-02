<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 01 Aug 2019 09:51:34 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Agrement
 * 
 * @property int $id
 * @property string $uuid
 * @property string $details
 * @property int $compteurs_id
 * @property int $gestionnaires_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Operateur $operateur
 * @property \App\Gestionnaire $gestionnaire
 *
 * @package App
 */
class Agrement extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;use \App\Helpers\UuidForKey;

	protected $casts = [
		'compteurs_id' => 'int',
		'gestionnaires_id' => 'int'
	];

	protected $fillable = [
		'uuid',
		'details',
		'compteurs_id',
		'gestionnaires_id'
	];

	public function operateur()
	{
		return $this->belongsTo(\App\Operateur::class, 'compteurs_id');
	}

	public function gestionnaire()
	{
		return $this->belongsTo(\App\Gestionnaire::class, 'gestionnaires_id');
	}
}
