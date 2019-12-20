<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
	protected $table = 'applicant';

	protected $fillable = ['userId', 'id_type', 'id_number', 'moblie_num', 'dateOfBirth'
	];

	public function users(){
		return $this->belongsTo('App\User');
	}
}
