@extends('layouts.master')


@section('content')

    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="{{url('/')}}">home</a></li>
                            <li>Shopping cart</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->

    <div class="shopping_cart_area mt-60">
        <div class="container">
            <form action="#">
                <div class="row">
                    <div class="col-12">
                        <div class="table_desc">
                            <div class="cart_page table-responsive">
                                <table>
                                    <thead>
                                    <tr>
                                        <th class="product_remove">Delete</th>
                                        <th class="product_thumb">Image</th>
                                        <th class="product_name">Product</th>
                                        <th class="product-price">Price</th>
                                        <th class="product_quantity">Quantity</th>
                                        <th class="product_total">Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($products as $product)
                                        <tr>
                                        <td class="product_remove ">
                                            <a class="text-danger" href="{{route('product.remove.cart', Crypt::encrypt($product['item']['productid']))}}">
                                                <i class="fa fa-trash-o"></i>
                                            </a>
                                        </td>
                                        <td class="product_thumb"><a href="{{ route('product.details', Crypt::encrypt($product['item']['productid'])) }}"><img src="{{asset($product['item']['productimg'] )}}" alt=""></a></td>
                                        <td class="product_name">
                                            <a href="{{ route('product.details', Crypt::encrypt($product['item']['productid'])) }}">{{$product['item']['productname']}} </a>
                                            <p class="text-muted small">{{$product['item']['description']}} </p>
                                        </td>
                                        <td class="product-price">&#8358;{{$product['item']['price']}} </td>
                                        <td class="product_quantity"><label>Quantity</label>
                                            <input data-html="{{route('product.update.cart',Crypt::encrypt($product['item']['productid']))}}" data-id="{{$product['item']['productid']}}" name="qty" min="1" max="100" value="{{$product['qty']}}" type="number"></td>
                                        <td class="product_total">&#8358;{{$product['price']}} </td>


                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
{{--                            <div class="cart_submit">--}}
{{--                                <button type="submit">update cart</button>--}}
{{--                            </div>--}}
                        </div>
                    </div>
                </div>
                <!--coupon code area start-->
                <div class="coupon_area">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="coupon_code left">
                                <h3>Discount</h3>
                                <div class="coupon_inner">
                                    <p>Enter your discount code if you have one.</p>
                                    <input placeholder="Discount code" type="text" id="discode">
                                <button type="button" id="discount" data-html="{{route('product.discount.cart')}}">Apply discount</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="coupon_code right">
                                <h3>Cart Totals</h3>
                                <div class="coupon_inner">
                                    <div class="cart_subtotal">
                                        <p>Subtotal</p>
                                        <p class="cart_amount">&#8358;{{number_format($totalprice)}}</p>
                                    </div>
                                    <div class="cart_subtotal ">
                                        <p>Shipping</p>
                                        <p class="cart_amount"><span>Free</span> &#8358;0</p>
                                    </div>
                                    @if($discount)
                                    <div class="cart_subtotal ">
                                        <p>
                                            <span><a id="redis" data-href="{{route('product.discount.out')}}" style="background: inherit; border: none; display: inline" class="text-danger">X</a></span>
                                            <span>Discount</span></p>
                                        <p class="cart_amount"><span>{{$discount}}%</span> &#8358;{{number_format(($discount*$totalprice)/100)}}</p>
                                    </div>
                                    @endif

                                    <div class="cart_subtotal">
                                        <p>Total</p>
                                        @if($discount)
                                            <p class="cart_amount">&#8358;{{number_format($totalprice - ($discount*$totalprice)/100)}}</p>
                                         @else
                                         <p class="cart_amount">&#8358;{{number_format($totalprice)}}</p>

                                         @endif
                                    </div>
                                    <div class="checkout_btn">
                                        <a href="{{route('cart.check.out')}}">Proceed to Checkout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--coupon code area end-->
            </form>
        </div>
    </div>


@endsection

@section('footer')

 @endsection

@section('scripts')
    <script type="text/javascript" src="{{asset('assets/js/sweetalert2.min.js')}}"></script>
    <script>
        $(function(){

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            function updatecart(qty,url,id){

                $.ajax({
                    type: "GET",
                    url:url,
                    data:{
                        qty:qty,
                        id: id
                    },
                    success: function(data){
                        if(data.success === true){
                            location.reload();
                        }
                    },
                    error: function(data) {
                        console.log(data);
                    },
                    dataType : "json"
                })
            }

            $('input[name="qty"]').change( function(evt){

                qty = evt.target.value;
                url = $(this).attr('data-html');
                id = $(this).attr('data-id');
                updatecart(qty,url, id);

            });

            $('input[name="qty"]').keyup( function(evt){

                if (evt.keyCode === 13){
                    qty = evt.target.value;
                    url = $(this).attr('data-html');
                    id = $(this).attr('data-id');
                    updatecart(qty,url, id);
                }

            });

            $('#discount').click(function(evt){
                code = $('#discode').val();
                url = $(this).attr('data-html');

                $.ajax({
                    type: "GET",
                    url:url,
                    data:{
                        code:code,
                    },
                    success: function(data){
                        if(data.success === true){
                            location.reload();

                        }else{
                            Swal.fire(
                                'Sorry!',
                                'This code has been used!',
                                'error'
                            )
                        }
                    },
                    error: function(data) {

                    },
                    dataType : "json"
                })
            });

            $('#redis').click(function(evt){
                evt.preventDefault();
                url = $(this).attr('data-href');
                $.ajax({
                    type: "GET",
                    url:url,
                    success: function(data){
                        if(data.success === true){
                            location.reload();

                        }else{
                            Swal.fire(
                                'Sorry!',
                                'This code has been used!',
                                'error'
                            )
                        }
                    },
                    error: function(data) {

                    },
                    dataType : "json"
                })
            })

        });

    </script>

@endsection
