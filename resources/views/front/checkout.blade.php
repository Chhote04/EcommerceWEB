@extends('front.master')
@section('content')
    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="#">Home</a>
                    <a class="breadcrumb-item text-dark" href="#">Shop</a>
                    <span class="breadcrumb-item active">Checkout</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Checkout Start -->
    <div class="container-fluid">
        <form action="{{url('/place_order')}}" method="post">
            @csrf
        <div class="row px-xl-5">
            <div class="col-lg-8">
                <h5 class="section-title position-relative text-uppercase mb-3"><span style="color: #2a96ff;" class="pr-3">Billing Address</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="row">
                        <input type="hidden" name="id" value="{{ $user_id = Auth::user()->id }}">
                        <div class="col-md-6 form-group">
                            <label>First Name</label>
                            <input type="text" name="name" class="form-control"
                            value="{{ $username = Auth::user()->name }}">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>E-mail</label>
                            <input type="email" name="email" class="form-control" value="{{$useremail = Auth::user()->email}}">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Mobile No</label>
                            <input type="text" name="phone" class="form-control">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Home No. , Stret, Address , Landmark</label>
                            <input type="text" name="address" class="form-control">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>City</label>
                            <input type="text" name="city" class="form-control">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Cuntry & State</label>
                            <input class="form-control" name="state" type="text">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>PIN/ZIP Code</label>
                            <input type="number" name="pin" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4" >
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="pr-3" style="color: #2a96ff;">Order Total</span></h5>
                <div class=" p-30 mb-5" style="background-color:#2a96ff; color: #f7f8fa;">
                    <?php $total_amount = 0; ?>
                    <?php $Shipping = 0; ?>
                    <h6 class="mb-3" style="color: #f7f8fa;">Products</h6>
                    @foreach ($cart as $ct)
                    <div class="border-bottom">
                        <div class="d-flex justify-content-between">
                            <p>{{ $ct->product_name }}</p>

                            <p>₹{{ $ct->product_price }} INR*</p>
                        </div>
                    </div>


                    <?php $total_amount = $total_amount + $ct->product_price * $ct->product_quantity; ?>
                    @endforeach

                    <div class="pt-2">
                        <div class="d-flex justify-content-between">
                            <p>Total Price Product </p>
                            <p>₹<?php echo $total_amount; ?> INR*</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p>Shipping</p>
                            <p>₹<?php echo $Shipping; ?> INR*</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p>Grand Total</p>
                            <input type="hidden" name="grand_t" value="<?php echo $total_amount + $Shipping; ?>">
                            <p>₹<?php echo $total_amount + $Shipping; ?> INR*</p>
                        </div>
                    </div>
                </div>
                <div class="mb-5">
                    <h5 class="section-title position-relative text-uppercase mb-3"><span class=" pr-3" style="color: #2a96ff;">Payment</span></h5>
                    <div class="bg-light p-30">
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment_method" value="paytm" id="paypal">
                                <label class="custom-control-label" for="paypal">Paytm</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment_method" value="pod" id="pod">
                                <label class="custom-control-label" for="pod">pay on Delivery</label>
                            </div>
                        </div>
                        
                        <button type="submit" onclick="confirmation()" class="btn btn-block  font-weight-bold py-3" style="background-color:#2a96ff; color: #f7f8fa;">Place Order</button>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
    <!-- Checkout End -->
    
@endsection