@extends('admin.layout.master')
@section('content')
<div class="container" >
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8" style="background-color: white">
            <div class="">
                <h3 class="text-center" style="background-color: #343a40; color:white">Edit Slider</h3>
            </div>
            <div>
                <form action="{{ url('admin/slider/update') }}" method="post" id="createCategory"
                enctype="multipart/form-data" class="form-horizontal">
                @csrf
                <input type="hidden" name="id" value="{{$data->id}}">
                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Title</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="name" name="title"  value="{{$data->title}}" placeholder="Enter Product Name" class="form-control" >

                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="textarea-input"
                            class=" form-control-label">Description</label></div>
                    <div class="col-12 col-md-9">
                        <textarea name="description" value="{{$data->description}}" id="textarea-input" rows="9" placeholder="Content..." class="form-control">{{$data->description}}</textarea>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="file-input" class=" form-control-label">Image</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="file" id="file-input" name="image" class="form-control-file"
                            style='height: 32px;' onchange="loadFilee(event)">
                            <img src="{{url('admin/upload/'.$data->image)}}" style="height: 150px; width:150px; border-radius:100%;" value="{{$data->image}}" alt="">
                        <img id="output" style="max-width: 150px; max-height: 150px; border-radius: 0%;">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-md">
                    <i class="fa fa-dot-circle-o"> update</i>
                </button>
            </form>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>
@endsection