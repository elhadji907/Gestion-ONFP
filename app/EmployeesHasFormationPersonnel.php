<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 08 Aug 2019 18:12:44 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class EmployeesHasFormationPersonnel
 * 
 * @property int $employees_id
 * @property int $formation_personnels_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Employee $employee
 * @property \App\FormationPersonnel $formation_personnel
 *
 * @package App
 */
class EmployeesHasFormationPersonnel extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	protected $primaryKey = 'employees_id';

	protected $casts = [
		'formation_personnels_id' => 'int'
	];

	protected $fillable = [
		'formation_personnels_id'
	];

	public function employee()
	{
		return $this->belongsTo(\App\Employee::class, 'employees_id');
	}

	public function formation_personnel()
	{
		return $this->belongsTo(\App\FormationPersonnel::class, 'formation_personnels_id');
	}
}
