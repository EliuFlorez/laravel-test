<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
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
	protected $table = 'clientes';

	/**
	 * Relation
	 *
	 * @return Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function recibos() 
	{
		return $this->belongsTo('App\Models\Recibo');
	}
}
