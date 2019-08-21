<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 08 Aug 2019 18:12:44 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class MissionsHasEmployee
 * 
 * @property int $missions_id
 * @property int $employees_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Employee $employee
 * @property \App\Mission $mission
 *
 * @package App
 */
class MissionsHasEmployee extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	protected $primaryKey = 'missions_id';

	protected $casts = [
		'employees_id' => 'int'
	];

	protected $fillable = [
		'employees_id'
	];

	public function employee()
	{
		return $this->belongsTo(\App\Employee::class, 'employees_id');
	}

	public function mission()
	{
		return $this->belongsTo(\App\Mission::class, 'missions_id');
	}
}
