@extends('layout.template')
@section('css', '/css/viewproduct.css')
@section('title', 'Details')

@section('content')
    <div class="viewpro-body-container p-5">
        <div class="row viewpro-card base" style="margin-top: 5rem;">
            <div class="card-collection d-flex justify-content-center flex-wrap gap-3">
                <div class="card" style="width: 80vw;">
                    <div class="viewpro-card-body p-4">
                        <div class="row">
                            <div class="col viewpro-card-rightside" style="margin-top: 2.5rem;">
                                <img src="{{Storage::url('/assets/'.$products->image)}}" class="viewpro-card-img-top" alt="" style="width: 40vw;">
                            </div>
                            <div class="col viewpro-card-rightside p-5">
                                <h3 class="viewpro-card-name">{{ $products->name }}</h3>
                                <h3 class="viewpro-card-price">@currency($products->price)</h3>
                                <h5 class="viewpro-card-year">{{ $products->year }}</h5>
                                <p class="viewpro-card-description">{{ $products->description }}</p>

                                @if(Auth::check() && Auth::user()->role == 'Admin')
                                    <div class="bottom-section">
                                        <div class="row">
                                            <div class="col">
                                                <div class="qty-edit-btn">
                                                    <a href="{{ route('edit_product', $products->id) }}" class="btn viewpro-btn btn-primary">Edit
                                                        Product</a>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <form action="{{ route('product_delete', $products->id) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-danger viewpro-btn">Delete Destination</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                @if(Auth::check() && Auth::user()->role == 'Member')
                                    <div class="bottom-section">
                                        <div class="col">
                                            <form action="{{ route('add_cart', $products->id) }}" method="post">
                                                @csrf
                                                <div class="row pb-3">
                                                    <div class="qty-input">
                                                        <label for="quantity" class="mb-3">Quantity :</label>
                                                        <input class="form-control mb-4" type="quantity" name="quantity" id="quantity" autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <button type="submit" class="btn btn-primary m-auto" style="width: 100%">Buy Ticket(s)</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                @endif

                                @if(!Auth::check())
                                    <div class="bottom-section">
                                        <div class="pb-3">
                                            <div class="login-to-purchase-btn">
                                                <a href="{{ route('index_login') }}"
                                                   class="btn viewpro-btn btn-success">Login
                                                    To Purchase Ticket</a>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            if({{ Session::has('alert') }}){
                alert('{{ Session::get('alert') }}');
            }
        </script>
@endsection
