<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use App\Qualification;
use App\User;

class QualificationController extends Controller
{
    //

    // Qualification list
    Public function AdminQualification(){
        //select all qualification 
        $All = Qualification::all();

        //user  Tier
        $tier= Auth::user()->getTier();

        //if he is An Admin for AdminSys
        if ($tier=="AdminSystem"){
            //create the view with data array
            return view('/AdminSystem/qualification/qualification', ['data'=>$All]);
        }else{
            // if not. redirect to welcome page 
            return redirect('/');
        }
    }


    // Qualification form
    public function QualificationForm(){

        //user  tier
    	$tier= Auth::user()->getTier();

        //if he is An Admin for AdminSys
		if ($tier=="AdminSystem"){
            //create the view with data array
			return view('/AdminSystem/qualificationForm');
		}else{
            // if not. redirect to welcome page 
			return view('/welcome');
		}
    }

    //store data to model
    public function QualificationStore(Request $request){

        // new class from qualification model 
    	$newQ = new Qualification;

        //insert data to class
        $newQ->name = $request->name;
        $newQ->minimum = $request->minscore;
        $newQ->maximum = $request->maxscore;
        $newQ->listGrade = $request->pscore;
        $newQ->resultCal = $request->Rule;

        //store data to model or instruct the model to create the data
        $newQ->save();

        //return to qualification page
        return redirect('admin/qualification');
    }

    

}
