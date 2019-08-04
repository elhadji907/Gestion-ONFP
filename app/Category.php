<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 04 Aug 2019 16:10:25 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Category
 * 
 * @property int $id
 * @property string $uuid
 * @property string $name
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $employees
 *
 * @package App
 */
class Category extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $fillable = [
		'uuid',
		'name'
	];

	public function employees()
	{
		return $this->hasMany(\App\Employee::class, 'categories_id');
	}
}
