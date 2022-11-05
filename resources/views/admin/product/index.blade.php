@extends('admin.layout.master')
@section('content')
<div class="card" style="margin-top: 50px;">
    <div class="card-header">
        <h3 class="card-title">Product Display</h3>
        <button type="button" class="btn btn-primary mb-1" data-toggle="modal" data-target="#createModal"
            style="float:right">
            <i class="fa fa-plus"></i>
    </div>
 <!-- Main content -->
 <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Product data Display</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Category</th>
                  <th>Product name</th>
                  <th>Product Price</th>
                  <th>Product description</th>
                  <th>Product image</th>
                  <th>Product Size</th>
                  <th>Product color</th>
                  <th>Product quantity</th>
                  <th>Product Action</th>
                </tr>
                </thead>
                <tbody>
                    <?php $i=1; ?>
                    @foreach($data as $d)
                    <tr>
                    <td>{{$i++}}</td>
                    <td>{{$d->category->name ?? null}}</td>
                    <td>{{$d->product_name}}</td>
                    <td>{{$d->product_price}}</td>
                    <td>{{$d->product_description}}</td>
                    <td><img src="{{url('admin/upload/'.$d->product_image) }}" alt="Product  Image" style="height: 50px; width:50px;"></td>
                    <td>{{$d->product_size}}</td>
                    <td>{{$d->product_color}}</td>
                    <td>{{$d->quantity}}</td>
                    <td>
                        <a href="{{url('admin/product/edit/'.$d->id)}}" type="button" class="btn btn-info">Edit</a>
                    <br>
                        <a href="{{url('admin/product/delete/'.$d->id)}}" type="button" class="btn btn-info">Delete</a>
                    </td>
                    </tr>
                    @endforeach

                </tbody>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Product name</th>
                        <th>Product Price</th>
                        <th>Product description</th>
                        <th>Product image</th>
                        <th>Product Size</th>
                        <th>Product color</th>
                        <th>Product quantity</th>
                        <th>Product Action</th>
                      </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->

        {{-- model for add category + button start --}}
        <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel"
            data-backdrop="static" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="mediumModalLabel">Create Category</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ url('admin/product/save') }}" method="post" id="createCategory"
                            enctype="multipart/form-data" class="form-horizontal">
                            @csrf
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="select" class=" form-control-label">Catagory</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <select name="category" id="select" class="form-control">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Product Name</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="name"name="product_name" placeholder="Enter Product Name" class="form-control">

                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Product Price</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="number" id="name" name="product_price" placeholder="Enter Product Price" class="form-control">

                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="textarea-input"
                                        class=" form-control-label">Product Description</label></div>
                                <div class="col-12 col-md-9">
                                    <textarea name="product_description" id="textarea-input" rows="9" placeholder="Content..." class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="file-input" class=" form-control-label">Product  Image</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="file" id="file-input" name="product_image" class="form-control-file"
                                        style='height: 32px;' onchange="loadFilee(event)">
                                    <img id="output" style="max-width: 150px; max-height: 150px; border-radius: 0%;">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Product Size</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="number" id="name" name="product_size" placeholder="Enter Product size" class="form-control">

                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Product Color</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="name" name="product_color" placeholder="Enter Product Color" class="form-control">

                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Product Quantity</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="number" id="name" name="quantity" placeholder="Enter Product Quantity" class="form-control">

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
                                <i class="fa fa-dot-circle-o"></i> Submit
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- model for add category + button end --}}
    <!-- /.card -->
@endsection