{{--{{ dd(session('count')) }}--}}
@extends('layout.app')

@section('content')

    @component('components.breadcrumbs')
        <a href="#">Home</a>
        <i class="fa fa-chevron-right breadcrumb-separator"></i>
        <span>Shopping Cart</span>
    @endcomponent
    <div class="cart-section container">
        <div>
            @if (session()->has('success_message'))
                <div class="alert alert-success">
                    {{ session()->get('success_message') }}
                </div>
            @endif
            @if(count($errors) > 0)
                <div class="alert alert-danger" style="margin-top: 20px">
                    <ul>
                        @foreach($errors->all() as $error )
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (Session::has('cart'))

                <h2>{{ count(session('cart')) }} item(s) in Shopping Cart</h2>

                <div class="cart-table">

                    @foreach(session('cart') as $id => $item)

                        <div class="cart-table-row">
                            <div class="cart-table-row-left">
                                <a href="{{ route('shop.show', $item->name) }}"><img
                                        src="{{ asset('images/products/'.$item->name.'.jpg') }}" alt="item"
                                        class="cart-table-img"></a>
                                <div class="cart-item-details">
                                    <div class="cart-table-item"><a href="">{{ $item->name }}</a></div>
                                    <div class="cart-table-item"><a href="">${{ $item->price }}</a></div>

                                </div>
                            </div>
                        </div> <!-- end cart-table-row -->
                @endforeach
                <!-- end cart-table-row -->

                </div> <!-- end cart-table -->


                <div class="cart-totals">

                    Subtotal: &nbsp &nbsp $ {{ subTotalPrice(session('cart'))  }} <br>
                    Taxes: &nbsp &nbsp &nbsp $ {{ taxPrice(session('cart')) }} <br>

                    @if(Session::has('product'))
                        Discounts:  <br>
                        <input type="text" hidden  {{ $discount = 0 }}>
                        @foreach(session('product') as $id => $item)
                            &nbsp &nbsp  &nbsp  &nbsp &nbsp  {{ $item->discount }}% off {{ $item->name }} : -${{ calculateDiscount($item->price, $item->discount) }} <br>
                            <input type="text" hidden {{ $discount = $discount +  calculateDiscount($item->price, $item->discount)}}>

                        @endforeach
                        <br>

                    @endif
                    <input type="text" hidden  {{ isset($discount) ? $discount : 0 }}>

                    Total: &nbsp &nbsp  ${{ getTotalCardAfterTaxesAndDiscount(session('cart'), $discount ?? 0) }}

                </div> <!-- end cart-totals -->

                <div class="cart-buttons">
                    <a href="{{ route('shop.index') }}" class="button">Continue Shopping</a>
                </div>
            @else
                <h3>No items in Cart</h3>
                <div class="spacer"></div>
                <a href="{{ route('shop.index') }}" class="button"> Continue Shopping</a>
                <div class="spacer"></div>
            @endif

        </div>

    </div> <!-- end cart-section -->


@endsection

@section('extra-js')
    <script src="{{asset('js/app.js')}}"></script>
    <script>
        (function () {
            const classname = document.querySelectorAll('.quantity');

            Array.from(classname).forEach(function (element) {
                element.addEventListener('change', function () {
                    const id = element.getAttribute('data-id');
                    console.log(id);
                    axios.post('cart/' + id, {
                        quantity: this.value,
                        _method: 'patch'
                    })
                        .then(function (response) {
                            window.location.href = '{{ route('cart.index') }}'
                        })
                        .catch(function (error) {
                            window.location.href = '{{ route('cart.index') }}'
                        });
                })
            })
        })();
    </script>
@endsection






















