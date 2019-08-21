<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 08 Aug 2019 18:12:44 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Mission
 * 
 * @property int $id
 * @property string $uuid
 * @property string $numero
 * @property string $name
 * @property string $account
 * @property string $reliquat
 * @property string $montant_total
 * @property string $destination
 * @property \Carbon\Carbon $date_debut
 * @property \Carbon\Carbon $date_fin
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $employees
 *
 * @package App
 */
class Mission extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $dates = [
		'date_debut',
		'date_fin'
	];

	protected $fillable = [
		'uuid',
		'numero',
		'name',
		'account',
		'reliquat',
		'montant_total',
		'destination',
		'date_debut',
		'date_fin'
	];

	public function employees()
	{
		return $this->belongsToMany(\App\Employee::class, 'missions_has_employees', 'missions_id', 'employees_id')
					->withPivot('deleted_at')
					->withTimestamps();
	}
}
