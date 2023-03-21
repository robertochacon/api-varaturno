<?php

namespace App\Http\Controllers;

use App\Patients;
use Illuminate\Http\Request;

class PatientsController extends Controller
{
    public function index()
    {
        $patients = Patients::with('entity')->orderBy('id', 'DESC')->get();
        return response()->json(["data"=>$patients],200);
    }

    public function register()
    {
        $patient = new Patients(request()->all());
        $patient->save();
        return response()->json(["data"=>$patient],200);
    }

    public function userProfile()
    {
        return response()->json(auth()->user());
    }

    public function update(Request $request, $id){
        try{
            $patient = Patients::find($id);
            $patient->update($request->all());
            return response()->json(["data"=>"ok"],200);
        }catch (Exception $e) {
            return response()->json(["data"=>"none"],200);
        }
    }

    public function delete($id){
        try{
            $patient = Patients::destroy($id);
            return response()->json(["data"=>"ok"],200);
        }catch (Exception $e) {
            return response()->json(["data"=>"none"],200);
        }
    }
}
