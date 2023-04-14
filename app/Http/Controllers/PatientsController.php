<?php

namespace App\Http\Controllers;

use App\Patients;
use Illuminate\Http\Request;
use App\Events\UpdateTurns;

class PatientsController extends Controller
{
    public function index()
    {
        $patients = Patients::with('entity')->orderBy('id', 'ASC')->get();
        return response()->json(["data"=>$patients],200);
    }

    public function register()
    {
        $patient = new Patients(request()->all());
        $patient->save();
        event(new UpdateTurns('register_patient'));
        return response()->json(["data"=>$patient],200);
    }

    public function userProfile()
    {
        return response()->json(auth()->user());
    }

    public function update(Request $request, $id){
        try{
            $patient = Patients::find($id);
            if($patient->status == 'call_patient'){
                $msg = ['action'=>'call_patient','patient'=>$patient->name];
            }else{
                $patient->update($request->all());
                $msg = ['action'=>'update_patient'];
            }
            event(new UpdateTurns($msg));
            return response()->json(["data"=>"ok"],200);
        }catch (Exception $e) {
            return response()->json(["data"=>"none"],200);
        }
    }

    public function delete($id){
        try{
            $patient = Patients::destroy($id);
            $msg = 'delete_patient';
            event(new UpdateTurns($msg));
            return response()->json(["data"=>"ok"],200);
        }catch (Exception $e) {
            return response()->json(["data"=>"none"],200);
        }
    }
}
