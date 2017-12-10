<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    public $timestamps = TRUE;
	protected $table = 'albums';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name'
	];

	public static $rules = [
		'name' => 'required'
	];

	// public function authors() {
	// 	$this->hasOne('authors', 'authors_id', 'id');
	// }

	public static $observers = [
		'App\observers\AlbumObserver'
	];

	public function track(){
		return $this->belongsTo(track::class);
	}
}
