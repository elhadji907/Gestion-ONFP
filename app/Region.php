<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 30 Aug 2019 16:00:14 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Region
 * 
 * @property int $id
 * @property string $uuid
 * @property string $nom
 * @property int $pays_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Pay $pay
 * @property \Illuminate\Database\Eloquent\Collection $departements
 *
 * @package App
 */
class Region extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'pays_id' => 'int'
	];

	protected $fillable = [
		'uuid',
		'nom',
		'pays_id'
	];

	public function pay()
	{
		return $this->belongsTo(\App\Pay::class, 'pays_id');
	}

	public function departements()
	{
		return $this->hasMany(\App\Departement::class, 'regions_id');
	}
}
