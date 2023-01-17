@extends('layout.template')
@section('css', '/css/mycart.css')
@section('title', 'My Cart')

@section('content')
    <div class="mycart-body-container">
        <div class="mycart-body-content p-5">
            <h1 class="ps-5">My Ticket(s) Order</h1>
        </div>
        <div class="container-fluid mycart-card base">
            @if(!isset($cartProducts))
                <h4 class="text-center">No Ticket(s) Added</h4>
            @else
                <div class="card-collection d-flex justify-content-center align-items-center flex-wrap gap-3">
                    @foreach($cartProducts as $cartProduct)
                        <form action="{{ route('remove_cart', $cartProduct->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <div class="card" style="width: 90vw;">
                                <div class="mycart-card-body p-4">
                                    <div class="row">
                                        <div class="col mycart-card-rightside">
                                            <img src="{{Storage::url('/assets/'.$cartProduct->product->image)}}" class="mycart-card-img-top" alt="" style="width: 25vw;">
                                        </div>
                                        <div class="col mycart-card-midside">
                                            <p class="mycart-card-name">{{ $cartProduct->product->name }}</p>
                                            <p class="mycart-card-year pt-1">{{ $cartProduct->product->year }}</p>
                                            <p class="mycart-card-price">@currency($cartProduct->product->price)</p>
                                            <p class="mycart-card-quantity">{{ $cartProduct->quantity }} Pcs</p>
                                            <p class="mycart-card-description">{{ $cartProduct->product->description }}</p>
                                        </div>
                                        <div class="col-3 mycart-card-leftside">
                                            <div class="col">
                                                <div class="row">
                                                    <div class="qty-edit-btn">
                                                        <a href="{{ route('edit_cart', $cartProduct->id) }}" class="btn mycart-btn btn-primary">Edit Product
                                                            Quantity</a>
                                                    </div>
                                                </div>
                                                <div class="row pt-3">
                                                    <button class="btn btn-danger m-auto" style="width: 9.5vw;">Remove Item(s)</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    @endforeach
                </div>
                @php
                    $total = 0;
                    foreach ($cartProducts as $cartProduct){
                        $total += $cartProduct->product->price*$cartProduct->quantity;
                    }
                @endphp
        </div>
        <div class="d-flex w-100 justify-content-between px-5 mt-5" style="padding: 3rem 0 5rem 0;">
            <h3 class="ps-5">Total Price : @currency($total)</h3>
            <form action="{{ route('checkout') }}" method="post">
                @csrf
                <button class="btn btn-primary me-5" style="width: 10vw;">Checkout ({{ $cartProduct->quantity }})</button>
            </form>
        </div>
        @endif
    </div>
    @if($errors->any())
        <div class="alert alert-danger mt-2" style="width: 75vw;">
            <ul>
                @foreach($errors->all() as $error_data)
                    <li>{{ $error_data }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <script>
        if({{ Session::has('alert') }}){
            alert('{{ Session::get('alert') }}');
        }
    </script>
@endsection
