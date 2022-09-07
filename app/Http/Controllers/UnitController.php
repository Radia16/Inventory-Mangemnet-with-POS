<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UnitController extends Controller
{
    //
    public function UniteShow(){
        $units = Unit::all();
        return view('Product.unit',compact('units'));
    }

    public function UniteAdd(Request $request){
        $validator = Validator::make($request->all(),
        [
            'unit_name' => 'required'
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages()
            ]);
        } else {
            $units = new Unit;
            $units->unit_name      = $request->unit_name;
            $units->unit_character = $request->unit_character;
            $units->save();

            return response()->json([
                'message' => ' Units Added Successfully',
                'units' => $units
            ]);

        }

    }

    public function UniteEdit($unit_id){

        $unit = Unit::find($unit_id);
        return response()->json([
            'status' => 200,
            'unit' => $unit
        ]);

    }

    public function UniteUpdate(Request $request, $unit_id){

        $validator = Validator::make($request->all(),
        [
            'unit_name' => 'required'
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages()
            ]);
        } else {
            $units = Unit::find($unit_id);
            $units->unit_name      = $request->unit_name;
            $units->unit_character = $request->unit_character;
            $units->update();

            return response()->json([
                'message' => ' Units Added Successfully',
                'units' => $units
            ]);

        }

    }

    public function UniteDelete($unit_id){
        $unit = Unit::find($unit_id);
        $unit->delete();
        return redirect()->back();
    }


}
