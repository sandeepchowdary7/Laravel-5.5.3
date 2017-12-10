<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
    public $timestamps = TRUE;
	protected $table = 'tracks';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name',
		'path'
	];

	public static $rules = [
		'name' => 'required'
	];
}
