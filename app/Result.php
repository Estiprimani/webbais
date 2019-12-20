<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
	protected $table = 'result';

	protected $fillable = ['subjectId', 'applicantId', 'subject_name', 'score'];

	public function resultApplicant(){
		return $this->belongsTo('App\Applicant');
	}

	public function subjectResult(){
		return $this->belongsTo('App\Subject');
	}
}
