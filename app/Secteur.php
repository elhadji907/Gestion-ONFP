<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 08 Aug 2019 18:12:44 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Secteur
 * 
 * @property int $id
 * @property string $uuid
 * @property string $name
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $modules
 *
 * @package App
 */
class Secteur extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $fillable = [
		'uuid',
		'name'
	];

	public function modules()
	{
		return $this->hasMany(\App\Module::class, 'secteurs_id');
	}
}
