<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{

    public function index(){
        // $categories=Category::all();
        // echo "<pre>";
        // print_r($categories);
        return view('admin.category.index');
    }
    public function insert(Request $ta){
        // echo'<pre>';
        // print_r($insert_data->all());
        $file=$ta->file('image');
        // dd($ta);
        $filename = 'image'.time().'.'.$ta->image->extension();
        // dd($fillname);
        $file->move("admin/upload",$filename);
        $data=new Category();
        $data->name=$ta->name;
        $data->slug=$ta->slug;
        $data->description=$ta->description;
        $data->image=$filename;
        $data->save();
        if($data){
            return redirect('admin/category');
        }
    }
    public function display(){
        $data=Category::all();
        // echo'<pre>';
        // print_r($data);
        return view('admin.category.index',compact('data'));
    }
    public function edit($id){
        // echo $id;
        $data=Category::find($id);
        // echo'<pre>';
        // print_r($data);
        return view('admin.category.edit',compact('data'));
    }
    public function update(Request $a){

        if($a->hasFile('image')){
            $file =$a->file('image');
            $filename = 'image'. time().'.'.$a->image->extension();
            $file->move("upload/",$filename);
            $data = Category::find($a->id);
            $data->name =$a->name;
            $data->slug =$a->slug;
            $data->description =$a->description;

            $data->image =$filename;
            $data->save();
            if($data){
                return redirect('admin/category');
            }
        }else{
            $data = Category::find($a->id);
            $data->name =$a->name;
            $data->slug =$a->slug;
            $data->description =$a->description;
            $data->save();
            if($data){
                return redirect('admin/category');
            }
        }
    }
    public function delete($id){
        $data = Category::find($id);
        $delete=$data->delete();
        if($data){
            return redirect('admin/category');
        }
    }
}
