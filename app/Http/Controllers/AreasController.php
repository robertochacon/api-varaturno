<?php

namespace App\Http\Controllers;

use App\Areas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AreasController extends Controller
{
    public function index()
    {
        $areas = Areas::orderBy('id', 'DESC')->get();
        return response()->json(["data"=>$areas],200);
    }

    public function all($entity)
    {
        $areas = Areas::where("entity_id", $entity)->orderBy('id', 'DESC')->get();
        return response()->json(["data"=>$areas],200);
    }

    public function register(Request $request)
    {
        $area = new Areas(request()->all());
        $area->save();
        return response()->json(["data"=>$area],200);
    }

    public function update(Request $request, $id){
        try{
            $area = Areas::find($id);
            $area->update($request->all());
            return response()->json(["data"=>"ok"],200);
        }catch (Exception $e) {
            return response()->json(["data"=>"fail"],200);
        }
    }

    public function delete($id){
        try{
            $area = Areas::destroy($id);
            return response()->json(["data"=>"ok"],200);
        }catch (Exception $e) {
            return response()->json(["data"=>"fail"],200);
        }
    }

}
