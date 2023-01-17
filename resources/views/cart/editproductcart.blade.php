@extends('layout.template')
@section('css', '/css/viewproduct.css')
@section('title', 'Details')

@section('content')
<div class="viewpro-body-container p-5">
    <div class="row viewpro-card base">
        <div class="card-collection d-flex justify-content-center flex-wrap gap-3">
            <form action="{{ route('update_cart', $cartProduct->id) }}" method="post">
                @csrf
                <div class="card" style="width: 80vw;">
                    <div class="viewpro-card-body p-4">
                        <div class="row">
                            <div class="col viewpro-card-rightside m-auto">
                                <img src="{{Storage::url('/assets/'.$cartProduct->product->image)}}" class="viewpro-card-img-top" alt="" style="width: 40vw;">
                            </div>
                            <div class="col viewpro-card-rightside p-5">
                                <h3 class="viewpro-card-name">{{ $cartProduct->product->name }}</h3>
                                <h3 class="viewpro-card-price">Rp{{ $cartProduct->product->price }}</h3>
                                <h5 class="viewpro-card-year">{{ $cartProduct->product->year }}</h5>
                                <p class="viewpro-card-description">{{ $cartProduct->product->description }}</p>
                                <div class="bottom-section">
                                    <div class="col">
                                        <div class="row pb-3">
                                            <div class="d-flex flex-column align-items-start">
                                                <label for="quantity" class="mb-3">Quantity :</label>
                                                <input class="form-control" type="quantity" name="quantity" id="quantity" autocomplete="off">
                                            </div>
                                            <div class="mt-5">
                                                <button class="btn btn-primary w-100" type="submit">Update Cart</button>
                                            </div>
                                        </div>
                                        @if($errors->any())
                                            <div class="alert alert-danger my-2 p-3">
                                                <ul>
                                                    @foreach($errors->all() as $error_data)
                                                        <li> {{ $error_data }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
