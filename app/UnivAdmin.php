<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UniAdmin extends Model
{
	//
	protected $table = 'uniadmin';

	protected $fillable = ['userId', 'universityId'];

	public function Univ(){
		return $this->belongsTo('App\University');
	}
	public function users(){
		return $this->belongsTo('App\User');
	}
}
