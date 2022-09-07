<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{

//contruct for current user
    public $user;
    public function __construct()
    {
        $this->middleware(function($request,$next){

    $this->user=Auth::user();
    return $next($request);
        });
    }

   // add Category view page
   public function AddCategory()
   {
    if(is_null($this->user)|| !$this->user->can('product.delete')){
        abort('403','You dont have acces!!!!');
    }

    $categories  = Category::all();
    return view('Category.AddCategory',compact('categories'));
   }

   // Category list View page


        public function StoreCategory(Request $request)
        {
            if(is_null($this->user)|| !$this->user->can('product.delete')){
                abort('403','You dont have acces!!!!');
            }

            $validator = Validator::make($request->all(),
            [
                'category_name' =>'required|regex:/[a-zA-Z ]*/',
            ],
            [
            'category_name.required' => 'Please input category name'
            ]);


              if($validator->fails()){
                return response()->json([
                    'status' => 400,
                    'errors' => $validator->messages()
                ]);
              }
              else{

                  $cat= new Category;
                  $cat->category_name=$request->category_name;
                  $cat->save();

                  return response()->json([
                    'message' => "Category Added Successfully",
                    'cat'  => $cat
                ]);
              }



            //   return redirect()->route('category.list')->with($notification);

        }


//    public function CategoryList()
//    {
//     if(is_null($this->user)|| !$this->user->can('product.delete')){
//         abort('403','You dont have acces!!!!');
//     }
//     $categories  = Category::all();
//        return view('Category.CategoryList',compact('categories'));
//    }

    public function EditCategory($id)
    {
        if(is_null($this->user)|| !$this->user->can('product.delete')){
            abort('403','You dont have acces!!!!');
        }
        $category = Category::find($id);
        return response()->json([
            'status' => 200,
            'category'  => $category,
        ]);
    }

    public function UpdateCategory(Request $request,$id)
    {
        if(is_null($this->user)|| !$this->user->can('product.delete')){
            abort('403','You dont have acces!!!!');
        }

        $category=Category::find($id);

        $validator = Validator::make($request->all(),
        [
            'category_name' =>'required|regex:/[a-zA-Z ]*/',
        ],
        [
        'category_name.required' => 'Please input category name'
        ]);


        if($validator->fails()){
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages()
            ]);
        }else{


            $category->category_name = $request->category_name;
            $category->save();

            return response()->json([
                'message' => "Category updated Successfully",

            ]);

        }

    }

    public function DeleteCategory($id)
    {
        if(is_null($this->user)|| !$this->user->can('product.delete')){
            abort('403','You dont have acces!!!!');
        }
        Category::destroy($id);
        return redirect()->back();

    }

}


