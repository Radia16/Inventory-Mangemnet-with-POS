<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class BrandController extends Controller
{
    //show brands list
    public function brandView(){
        $brands = Brand::all();
        //dd($brands);
        return view('brand.manage_brand',compact('brands'));
    }

    // brand store
    public function brandStore(Request $request){

        $validator = Validator::make($request->all(),
        [
            'brand_name'  => 'required',
            'brand_image' => 'required|mimes:jpeg,jpg,png,webp|max:10000'
        ],
        [
            'brand_name.required'  => 'Brand Name is Required',
            'brand_image.required' => 'Brand Image is Required',
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages()
            ]);
        } else {

            // add image
            $save_image = null;
            if ($request->hasFile('brand_image') && $request->brand_image->isValid()){
                $image = $request->file('brand_image');
                $name_gen = hexdec(uniqid()) .'.'. $image->getClientOriginalExtension();
                Image::make($image)->resize(150,150)->save('upload/brand/'. $name_gen);
                $save_image = 'upload/brand/' . $name_gen;
            }

            $brand = new Brand;
            $brand->brand_name  = $request->brand_name;
            $brand->brand_image = $save_image;
            $brand->save();
            return response()->json([
                'message' => 'Brand Added Successfully',
                'brand'   => $brand
            ]);
        }
    }

    //edit brand
    public function brandEdit($brand_id){
        $brand = Brand::find($brand_id);

        return response()->json([
            'status' => 200,
            'brand'  => $brand,
        ]);

    }

    //update brand
    public function updateBrand(Request $request,$brand_id){

        $brand = Brand::find($brand_id);

        $validator = $request->validate([
            'brand_name'  => 'required',
            'brand_image' => 'required|mimes:jpeg,jpg,png,webp'
        ],
        [
            'brand_name.required'  => 'Brand Name is Required',
            'brand_image.required' => 'Brand Image is Required',
        ]);



            // add image
            $save_image = $brand->brand_image;
            if ($request->hasFile('brand_image') && $request->brand_image->isValid())
            {

                $this->removePreviousImage($brand->brand_image);

                $image = $request->file('brand_image');
                $name_gen = hexdec(uniqid()) .'.'. $image->getClientOriginalExtension();
                Image::make($image)->resize(150,150)->save('upload/brand/'. $name_gen);
                $save_image = 'upload/brand/' . $name_gen;
            }
            try {
            $brand->brand_name  = $request->brand_name;
            $brand->brand_image = $save_image;
            $brand->update();
            return response()->json(['message' => 'Brand Updated Successfully']);
            } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    //delete brand
    public function brandDelete($brand_id){
        $brand = Brand::find($brand_id);

        $brand->delete();
        return redirect()->back();
    }


    private function removePreviousImage($image){
        if(file_exists(public_path($image))){
            unlink(public_path($image));
            return true;
        }
        return false;
    }


}// main
