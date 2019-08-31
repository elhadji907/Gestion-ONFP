<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 30 Aug 2019 16:00:14 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Arrife
 * 
 * @property int $id
 * @property string $name
 * @property string $uuid
 * @property int $courriers_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Courrier $courrier
 *
 * @package App
 */
class Arrife extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'courriers_id' => 'int'
	];

	protected $fillable = [
		'name',
		'uuid',
		'courriers_id'
	];

	public function courrier()
	{
		return $this->belongsTo(\App\Courrier::class, 'courriers_id');
	}
}
