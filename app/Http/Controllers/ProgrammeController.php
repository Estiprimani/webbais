<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facedes\Auth;
use Illuminate\Http\Request;
use App\Programme;
use App\UniversityAdmin;

class NotificationController extends Controller
{
    public function UniversityProgramme(){
        $userid = Auth::user()->id;
        $id = UniversityAdmin::where('userId', $userid)
                                        ->first();
        $idUniv = $id->universityId; 
        $AllProgramme = Programme::where('universityId', $id->universityId)
                                    ->get();
        
        return view('/UniversitySys/home', ['Prog'=> $AllProg]);
    }
    public function UnivAddProgrammeForm($id){
        $tier= Auth::user()->getTier();
        if ($tier=="AdminUniv"){
            return view('/university/Prog',['UnivId'=> $id]);
        }
        else{
            return view('/welcome');
        }
    }
        
    public function UniAddProg($id, Request $request){
        $tier= Auth::user()->getTier();
        if ($tier=="AdminUniv"){
            $this->validate($request,[
                'name' => 'required',
                'description' => 'required',
                'closingdate' => 'required'
            ]);
    
            $Prog = new Programme;
        
            $Prog->programme_name = $request->name;
            $Prog->description = $request->description;
            $Prog->closing_date = $request->date;
            $Prog->save();
        
            if (!isset($request->repeat)){
                return view('/Admin/AddProgramme/{$id}',['Notice'=> 'univAdd']);
            }
            else{
                return view('/Admin/Programme',['Notice'=> 'univAdd']);
            }
        }
        else{
            return view('/welcome');
        }

    }
}
