<?php

namespace App\Http\Controllers;

use App\Rooms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RoomsController extends Controller
{
    public function index()
    {
        $rooms = Rooms::orderBy('id', 'DESC')->get();
        return response()->json(["data"=>$rooms],200);
    }

    public function all($entity)
    {
        $rooms = Rooms::where("entity_id", $entity)->orderBy('id', 'DESC')->get();
        return response()->json(["data"=>$rooms],200);
    }

    public function register(Request $request)
    {
        $room = new Rooms(request()->all());
        $room->save();
        return response()->json(["data"=>$room],200);
    }

    public function update(Request $request, $id){
        try{
            $room = Rooms::find($id);
            $room->update($request->all());
            return response()->json(["data"=>"ok"],200);
        }catch (Exception $e) {
            return response()->json(["data"=>"fail"],200);
        }
    }

    public function delete($id){
        try{
            $room = Rooms::destroy($id);
            return response()->json(["data"=>"ok"],200);
        }catch (Exception $e) {
            return response()->json(["data"=>"fail"],200);
        }
    }

}
