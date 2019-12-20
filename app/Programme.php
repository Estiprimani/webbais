<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Programme extends Model
{
	protected $table = 'programme';

	protected $fillable = ['univId', 'programme_name', 'description', 'closing_date'];

	public function Univ(){
		return $this->belongsTo('App\University');
	}
}
