<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index(){
        return view('admin.slider.index');
    }
    public function save(Request $a){
        // echo '<pre>';
        // print_r($a);
        $file=$a->file('image');
        // dd($a);
        $filename = 'pimg'.time().'.'.$a->image->extension();
        // dd($filename);
        $file->move("admin/upload",$filename);
        $data = new Slider();
        $data->title=$a->title;
        $data->description=$a->description;
        $data->image=$filename;
        $data->save();
        if($data){
            return redirect('admin/slider');
        }
    }
    public function display(){
        $data=Slider::all();
        //  echo '<pre>';
        //  print_r($data);
        // die;
        return view('admin.slider.index',compact('data'));
    }
    public function edit($id){
        // echo $id;
      
        $data=Slider::find($id);
        // echo '<pre>';
        //  print_r($data);
        //  die;
        return view('admin.slider.edit',compact('data'));
    }
    public function update(Request $d){
        //  echo '<pre>';
        //  print_r($d);
        if($d->hasFile('image')){
        $file =$d->file('image');
        $filename = 'pn'. time().'.'.$d->image->extension();
        $file->move("admin/upload/",$filename);
        $data=slider::find($d->id);
        $data->title=$d->title;
        $data-> description=$d->description;
        $data->image=$filename;
        $data->save();
        if($data){
            return redirect('admin/slider');
        }
    }
    else{
        $data = slider::find($d->id);
        $data->title=$d->title;
        $data->description=$d->description;
        $data->save();
        if($data){
            return redirect('admin/slider');
        }
    }
}
public function delete($id){
    $d=slider::find($id);
    $deleted=$d->delete();
    if($deleted){
        return redirect('admin/slider');
    }
}
}
