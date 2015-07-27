<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Detalle extends Model
{
	/**
	 * SoftDeletingTrait
	 */
	use SoftDeletes;

	/**
	 * SoftDeletingTrait
	 *
	 * @var Date
	 */
    protected $dates = ['deleted_at'];
	
	/**
	 * Guarded
	 */
    protected $guarded = [];
	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'recibo_detalles';
}
