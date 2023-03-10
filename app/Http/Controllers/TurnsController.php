<?php

namespace App\Http\Controllers;

use App\Turns;
use Illuminate\Http\Request;

class TurnsController extends Controller
{
    public function index()
    {
        $turns = Turns::orderBy('id', 'DESC')->get();
        return response()->json(["data"=>$turns],200);
    }

    public function watch($id){
        try{
            $entity = Turns::find($id);
            return response()->json(["data"=>entity],200);
        }catch (Exception $e) {
            return response()->json(["data"=>"none"],200);
        }
    }

    public function register(Request $request)
    {
        $turns = new Turns(request()->all());
        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('/public/entities');
            $turns->logo = $path;
         }
        $turns->save();
        return response()->json(["data"=>$turns],200);
    }

    public function update(Request $request, $id){
        try{
            $orders = Turns::find($id);
            $orders->update($request->all());
            return response()->json(["data"=>"ok"],200);
        }catch (Exception $e) {
            return response()->json(["data"=>"none"],200);
        }
    }

    public function delete($id){
        try{
            $docuemnts = Turns::destroy($id);
            return response()->json(["data"=>"ok"],200);
        }catch (Exception $e) {
            return response()->json(["data"=>"none"],200);
        }
    }
}
