@extends('admin.layout.master')
@section('content')
<div class="container" >
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8" style="background-color: white">
            <div class="">
                <h3 class="text-center" style="background-color: #343a40; color:white">Edit Category</h3>
            </div>
            <div>
                <form action="{{ url('admin/product/update') }}" method="post" id="createCategory"
                enctype="multipart/form-data" class="form-horizontal">
                @csrf
                <input type="hidden" name="id" value="{{$data->id}}">
                <div class="row form-group">
                    <div class="col col-md-3"><label for="select" class=" form-control-label">Catagory</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <select name="catagory" id="select" class="form-control">
                            @foreach ($categories as $d)
                    <option value="{{ $d->id }}" {{$data->cate_id == $d->id ? 'selected' : ''}}  >{{ $d->name }}</option>
                    @endforeach
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Product Name</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="name" name="product_name"  value="{{$data->product_name}}" placeholder="Enter Product Name" class="form-control" >

                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Product Price</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="number" id="name" name="product_price" value="{{$data->product_price}}" placeholder="Enter Product Price" class="form-control">

                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="textarea-input"
                            class=" form-control-label">Product Description</label></div>
                    <div class="col-12 col-md-9">
                        <textarea name="product_description" value="{{$data->product_description}}" id="textarea-input" rows="9" placeholder="Content..." class="form-control">{{$data->product_description}}</textarea>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="file-input" class=" form-control-label">Product  Image</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="file" id="file-input" name="image" class="form-control-file"
                            style='height: 32px;' onchange="loadFilee(event)">
                            <img src="{{url('admin/upload/'.$data->product_image)}}" style="height: 150px; width:150px; border-radius:100%;" value="{{$data->image}}" alt="">
                        <img id="output" style="max-width: 150px; max-height: 150px; border-radius: 0%;">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Product Size</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="number" id="name" name="product_size" value="{{$data->product_size}}" placeholder="Enter Product size" class="form-control">

                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Product Color</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="name" name="product_color" value="{{$data->product_color}}" placeholder="Enter Product Color" class="form-control">

                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Product Quantity</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="number" id="name" name="quantity" value="{{$data->quantity}}" placeholder="Enter Product Quantity" class="form-control">

                    </div>
                </div>
                {{-- <div class="row form-group">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Product Status</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="number" id="name" name="ststus" placeholder="Enter Product Status" class="form-control">

                    </div> --}}
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