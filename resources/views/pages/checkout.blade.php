@extends("layouts.app")
@section("main")
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Checkout</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Checkout</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h6><span class="icon_tag_alt"></span> Have a coupon? <a href="#">Click here</a> to enter your code
                    </h6>
                </div>
            </div>
            <div class="checkout__form">
                <h4>Billing Details</h4>
                    <form action="{{url("/checkout")}}" method="post">
                        @csrf
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Name<span>*</span></p>
                                        <input name="full_name" type="text" value="{{old("full_name")}}" placeholder="Full Name">
                                        @error("full_name")
                                        <p class="text-danger"><i>{{$message}}</i></p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="checkout__input">
                                <p>Address<span>*</span></p>
                                <input type="text" name="address" placeholder="Address" value="{{old("full_name")}}" class="checkout__input__add" >
                                @error("address")
                                <p class="text-danger"><i>{{$message}}</i></p>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Telephone<span>*</span></p>
                                        <input name="tel" type="text" value="{{old("tel")}}" placeholder="Telephone" >
                                        @error("tel")
                                        <p class="text-danger"><i>{{$message}}</i></p>
                                        @enderror
                                    </div>
                                        <div class="checkout__input">
                                            <p>Email<span>*</span></p>
                                            <input name="email" type="email" placeholder="Email" value="{{old("email")}}">
                                            @error("email")
                                            <p class="text-danger"><i>{{$message}}</i></p>
                                            @enderror
                                        </div>
                                </div>
                            </div>
                            <div class="checkout__input__checkbox">
                                <p>Shipping method<span>*</span></p>
                                <label for="acc">
                                    Express
                                    <input name="shipping_method" value="Express" type="radio" id="acc" @if(old("shipping_method")=="Express") checked  @endif>
                                    <span class="checkmark"></span>
                                </label>
                                <br/>
                                <label for="free">
                                    Free Shipping
                                    <input name="shipping_method" @if(old("shipping_method")== "Free_Shipping") checked @endif value="Free_Shipping" type="radio" id="free">
                                    <span class="checkmark"></span>
                                </label>
                                @error("shipping_method")
                                <p class="text-danger"><i>{{$message}}</i></p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h4>Your Order</h4>
                                <div class="checkout__order__products">Products <span>Total</span></div>
                                <ul>
                                    @foreach($cart as $item)
                                    <li>{{$item->name}} (x{{$item->buy_qty}}) <span>${{$item->price * $item->buy_qty}}</span></li>
                                    @endforeach
                                </ul>
                                <div class="checkout__order__subtotal">Subtotal <span>${{$subtotal}}</span></div>
                                <div class="checkout__order__total">Total <span>${{$total}}</span> + 10% VAT</div>


                                <div class="checkout__input__checkbox">
                                    <label for="payment">
                                        COD
                                        <input name="payment_method" type="radio" id="payment" value="COD" @if(old("payment_method")=="COD") checked  @endif>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="checkout__input__checkbox">
                                    <label for="paypal">
                                        Paypal
                                        <input name="payment_method" value="Paypal" type="radio" id="paypal"@if(old("payment_method")=="Paypal") checked  @endif>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                @error("payment_method")
                                <p class="text-danger"><i>{{$message}}</i></p>
                                @enderror
                                <button type="submit" class="site-btn">PLACE ORDER</button>

                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->
@endsection
