<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
   public $timestamps = TRUE;
	protected $table = 'products';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name',
		'price'
	];

	public static $rules = [
		'name'  => 'required',
		'price' => 'required'
	];

}
