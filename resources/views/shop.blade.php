@extends('layout.app')

@section('content')

    @component('components.breadcrumbs')
        <a href="/">Home</a>
        <i class="fa fa-chevron-right breadcrumb-separator"></i>
        <span>Shop</span>
    @endcomponent

    <div class="container">
        @if(count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

    <div class="products-section container">
        <div class="sidebar">
            <h3>By Category</h3>
            <ul>
                @foreach ($categories as $category)
                    <li><a href="{{ route('shop.index', ['category' => $category->slug]) }}">{{ $category->name }}</a></li>
                @endforeach
            </ul>
        </div> <!-- end sidebar -->
        <div>
            <div class="products-header">
                <h1 class="stylish-heading">{{ $categoryName }}</h1>
            </div>

            <div class="products text-center">
                @forelse ($products as $product)
                    <div class="product">
                        <a href="{{ route('shop.show', $product->slug) }}"><img src="{{ asset('images/products/'.$product->image) }}" style=" width:  100px;  height: 100px; object-fit: cover;" alt="product"></a>
                        <a href="{{ route('shop.show', $product->slug) }}"><div class="product-name">{{ $product->name }}</div></a>
                        @if($product->discount != null)
                        <a href="{{ route('shop.show', $product->slug) }}"><div class="product-name">After discount: ${{ calculateDiscount($product->price, $product->discount)}}</div></a>
                        @else
                        <a href="{{ route('shop.show', $product->slug) }}"><div class="product-name">${{ $product->price }}</div></a>
                        @endif
                        @if($product->discount != null)
                        <a href=""><div class="product-discount" style="color: red">{{ $product->name }} has discount  {{ $product->discount }} %</div></a>
                        @endif
                        <div class="product-price"></div>
                    </div>
                @empty
                    <div style="text-align: left">No items found</div>
                @endforelse
            </div> <!-- end products -->

            <div class="spacer"></div>
        </div>
    </div>

@endsection

