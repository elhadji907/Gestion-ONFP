<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 04 Aug 2019 16:10:25 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class OperateursHasNiveaux
 * 
 * @property int $operateurs_id
 * @property int $niveaux_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Niveau $niveau
 * @property \App\Operateur $operateur
 *
 * @package App
 */
class OperateursHasNiveaux extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	protected $table = 'operateurs_has_niveaux';
	protected $primaryKey = 'operateurs_id';

	protected $casts = [
		'niveaux_id' => 'int'
	];

	protected $fillable = [
		'niveaux_id'
	];

	public function niveau()
	{
		return $this->belongsTo(\App\Niveau::class, 'niveaux_id');
	}

	public function operateur()
	{
		return $this->belongsTo(\App\Operateur::class, 'operateurs_id');
	}
}
