<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\category;
use Illuminate\Support\Facades\Redirect;
use DB;

class CategoryController extends Controller
{   
    public function CategoryManage(){

        $Categorys = DB::table('category')
        ->orderBy('category.id', 'DESC') 
        ->paginate(10); 

        return view('Admin.Category.ListCategory',
            [
                'Categorys'=>$Categorys,
            ]
        );  
    }

    public function AddCategory(){
        return view('Admin.Category.AddCategory'); 
    }
    public function AddCategorySubmit(Request $request){
        DB::table('category')->insert(
            [   
                'name'=>$request['name']
            ]
        );
        return redirect('admin/quan-ly-danh-muc');  
    }
    public function EditCategory($id){
        $Category = DB::table('category')->where('id',$id)->first();
        return view('Admin.Category.EditCategory',
            [
                'Category'=>$Category
            ]
        );  
    }

    public function EditCategorySubmit($id, Request $request){
        DB::table('category')->where('id',$id)->update(
            [   
                'name'=>$request->name
            ]
        );
        return redirect('admin/quan-ly-danh-muc');
    }

    public function DeleteCategory($id){
        $DeleteCategory = DB::table('category')->where('id', $id)->delete();
        return back();
    }

}
