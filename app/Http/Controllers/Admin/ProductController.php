<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::all();
        $categories =Category::all();
        // echo'<pre>';
        // print_r($categories);
        // die;
        return view('admin.product.index',compact('product','categories'));
    }
    public function save(Request $a){
        // echo '<pre>';
        // print_r($a);
        $file=$a->file('product_image');
        // dd($a);
        $filename = 'pimg'.time().'.'.$a->product_image->extension();
        // dd($filename);
        $file->move("admin/upload",$filename);
        $data = new Product();
        $data->cate_id=$a->category;
        $data->product_name=$a->product_name;
        $data->product_price=$a->product_price;
        $data->product_description=$a->product_description;
        $data->product_image=$filename;
        $data->product_size=$a->product_size;
        $data->product_color=$a->product_color;
        $data->quantity=$a->quantity;
        $data->save();
        if($data){
            return redirect('admin/product');
        }
    }
    public function display(){
        $categories =Category::all();
        $data=Product::all();
        //  echo '<pre>';
        //  print_r($data);
        // die;
        return view('admin.product.index',compact('data','categories'));
    }
    public function edit($id){
        // echo $id;
        $categories =Category::all();
        $data=Product::find($id);
        // echo '<pre>';
        //  print_r($data);
        //  die;
        return view('admin.product.edit',compact('data','categories'));
    }
    public function update(Request $d){
        //  echo '<pre>';
        //  print_r($d);
        if($d->hasFile('image')){
        $file =$d->file('image');
        $filename = 'pn'. time().'.'.$d->image->extension();
        $file->move("admin/upload/",$filename);
        $data=Product::find($d->id);
        
        $data->cate_id=$d->category;
        $data->product_name=$d->product_name;
        $data-> product_description=$d->product_description;
        $data->product_image=$filename;
        $data->product_price=$d->product_price;
        $data->quantity=$d->quantity;
        $data->save();
        if($data){
            return redirect('admin/product');
        }
    }
    else{
        $data = Product::find($d->id);
        $data->cate_id=$d->category;
        $data->product_name=$d->product_name;
        $data->product_description=$d->product_description;
        $data->product_price=$d->product_price;
        $data->quantity=$d->quantity;
        $data->save();
        if($data){
            return redirect('admin/product');
        }
    }
}
public function delete($id){
    $d=Product::find($id);
    $deleted=$d->delete();
    if($deleted){
        return redirect('admin/product');
    }
}
}
