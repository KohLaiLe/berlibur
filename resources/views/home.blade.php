@extends('layout.template')
@section('css', '/css/home.css')
@section('title', 'Home')

@section('content')
<div class="home-body-container">
    <div class="home-body-content p-4">
        @if(isset($query))
            <div class="row home-text">
                <h3 class="text-center p-5">Showing '{{ $query }}' search result(s).</h3>
            </div>
        @endif
        <div class="row home-text">
            <h1 class="mb-5 ps-5">Best Destination</h1>
        </div>
        <div class="row home-card base">
            <div class="card-collection d-flex flex-wrap justify-content-start gap-5 ps-5">
                @foreach ($products as $product)
                    <div class="card mb-5" style="width: 35rem;">
                        <img src="{{Storage::url('/assets/'.$product->image)}}" class="home-card-img-top" alt="" style="height: 37vh;">
                        <div class="home-card-body p-3">
                            <div class="row">
                                <div class="col home-card-rightside">
                                    <p class="home-card-title">{{ $product->name }}</p>
                                </div>
                                <div class="col home-card-leftside">
                                    <p class="home-card-year pt-1">{{ $product->year }}</p>
                                </div>
                            </div>
                            <p>@currency($product->price)</p>
                            <h6 class="home-card-text"></h6>
                            <a href="{{ route('product_detail', $product->id) }}" class="btn home-btn btn-primary">View Destination</a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="d-flex justify-content-center">
                {{ $products->links() }}
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
