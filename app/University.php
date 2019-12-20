<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class University extends Model
{
	//
	protected $table = 'university';

	protected $fillable = ['UnivName'];

	public function UniversityAdmin(){
		return $this->hasMany('App\UniAdmin');
	}

	public function UniversityProgramme(){
		return $this->hasMany('App\Programme');
	}
}
