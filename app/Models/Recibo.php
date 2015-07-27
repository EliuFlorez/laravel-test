<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Recibo extends Model
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
	protected $table = 'recibos';
}
