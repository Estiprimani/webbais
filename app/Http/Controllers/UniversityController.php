<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\University;
use App\UniAdmin;
use App\User;

class UniversityController extends Controller
{

	public function AdminUniversity(){
		$AllUniv = University::all();

		$tier= Auth::user()->getTier();

		if ($tier=="AdminSystem"){
			return view('/AdminSystem/home', ['uni'=>$AllUniv]);
		}else{
			return redirect('/');
		}
	}

    //Form for creating university
    public function AdminUniversityForm(){
    	return view('/AdminSystem/university/form');
    }

    //Add new University
    public function AdminAddUniv(Request $request){
        //Create new university class
    	$univ = new University;
        $univ->UnivName = $request->name;
        // save to database
        $univ->save();
        /// redirect to university Admin 
        return view('/AdminSystem/university/adminForm',['Notice'=> 'univAdd', 'UnivId' => $univ->id]);
    }

    //Add new Admin for university
    public function AdminAddAdmin(Request $request){

        //create new class for new user 
        $newUser = new User;
        $newUser->username = $request->username;
        $newUser->name = $request->name;
        $newUser->email = $request->email;
        $newUser->tier = "AdminUniv";
        $newUser->password = Hash::make($request['password']);
        //save to database
        $newUser->save();

        //create new class for new Uniadmin 
        $newUnivAdmin = new UnivAdmin;
        $newUnivAdmin->userId = $newUser->id;
        $newUnivAdmin->universityId =$request->univId;
        //save to database
        $newUnivAdmin->save();

        //redirect to home
        return redirect('/admin/home');
    }

    //Edit University form
    public function AdminEditUnivForm($id){
   		$Univ = University::find($id);
   		return view('/AdminSystem/form',['Notice'=>'univAdd', 'Univ'=>$Univ]);
    }

    //Update the University
    public function AdminUpdateUniv($id, Request $request){
	    $this->validate($request,[
    	 	'name' => 'required'
    	]);

    	$Univ = University::find($id);
    	$Univ->UnivName =  $request->nama;
    	$univ->save();
    	return view('/AdminSystem/uni',['Notice'=> 'univEdit']);
	}

	//Delete the University
	public function AdminDeleteUniv($id){
		//check UniAdmin and delete the UniAdmin
		//check Programme and delete 
		//check if there are application to the programme and delete it
	}


}
