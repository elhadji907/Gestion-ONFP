<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 03 Oct 2019 11:32:17 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TypesCourrier
 * 
 * @property int $id
 * @property string $uuid
 * @property string $name
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $courriers
 *
 * @package App
 */
class TypesCourrier extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $fillable = [
		'uuid',
		'name'
	];

	public function courriers()
	{
		return $this->hasMany(\App\Courrier::class, 'types_courriers_id');
	}
}
