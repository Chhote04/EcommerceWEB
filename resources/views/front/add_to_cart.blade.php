@extends('front.master')
@section('content')
    <!-- Cart Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-light table-borderless table-hover text-center mb-0">
                    <thead style="background-color:#2a96ff; color: #f7f8fa;" >
                        <tr>
                            <th>Products</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        <?php $total_amount = 0; ?>
                        @foreach ($cart as $ct)
                            <tr>
                                <td class="align-middle"><img style="width: 50px;"
                                        src="{{ url('/admin/upload/' . $ct->product_image) }}" alt="item">
                                    {{ $ct->product_name }}</td>
                                <td class="align-middle">{{ $ct->product_price }}</td>
                                <td class="align-middle">
                                    <div class="input-group quantity mx-auto" style="width: 100px;">
                                        <div class="input-group-btn">
                                            <button class="btn btn-sm btn-minus" style="background-color:#2a96ff; color: #f7f8fa;">
                                                <i class="fa fa-minus"></i>
                                            </button>
                                        </div>
                                        <input type="text"
                                            class="form-control form-control-sm bg-secondary border-0 text-center"
                                            min="1" value="{{ $ct->product_quantity }}">
                                        <div class="input-group-btn">
                                            <button class="btn btn-sm btn-plus" style="background-color:#2a96ff; color: #f7f8fa;">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </td>
                                <td class="align-middle">{{ $ct->product_price * $ct->product_quantity }}</td>
                                <td class="align-middle">
                                    <a href="{{ url('add_to_cart/delete/' . $ct->id) }}"
                                        class="remove btn btn-sm btn-danger"><i class='fa fa-times'></i></a>
                                </td>

                            </tr>
                            <?php $total_amount = $total_amount + $ct->product_price * $ct->product_quantity; ?>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-lg-4">
                <form class="mb-30" action="">
                    <div class="input-group">
                        <input type="text" class="form-control border-0 p-4" placeholder="Coupon Code">
                        <div class="input-group-append">
                            <button class="btn" style="background-color:#2a96ff; color: #f7f8fa;">Apply Coupon</button>
                        </div>
                    </div>
                </form>
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="pr-3" style="color: #2a96ff;">Cart
                        Summary</span></h5>
                <div class="bg-light p-30 mb-5">
                    {{-- <div class="border-bottom pb-2">
                    <div class="d-flex justify-content-between mb-3">
                        <h6>Subtotal</h6>
                        <h6>$150</h6>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h6 class="font-weight-medium">Shipping</h6>
                        <h6 class="font-weight-medium">$10</h6>
                    </div>
                </div> --}}
                    <div class="pt-2">
                        <div class="d-flex justify-content-between mt-2">
                            <h5>Total</h5>
                            <h5><?php echo $total_amount; ?></h5>
                        </div>
                        <a @if (Auth::check()) {{ $useremail = Auth::user()->email }} href="{{ url('/checkout') }}" @else href="{{ url('/login') }}" @endif
                            class="btn" style="background-color:#2a96ff; color: #f7f8fa;"><i class="flaticon-trolley"></i> Proceed to Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart End -->
@endsection
