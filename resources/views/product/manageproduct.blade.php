@extends('layout.template')
@section('css', '/css/manageproduct.css')
@section('title', 'Manage Product')

@section('content')
<div class="p-5 manage-product-body-container">
    <div class="row manage-product-head-table-row ps-1">
        <div class="col-1 manage-product-head-table-col pt-3">
            <p class="fw-semibold">No</p>
        </div>
        <div class="col-2 manage-product-head-table-col pt-3">
            <p class="fw-semibold">Destination Image</p>
        </div>
        <div class="col-2 manage-product-head-table-col pt-3">
            <p class="fw-semibold">Destination Name</p>
        </div>
        <div class="col-3 manage-product-head-table-col pt-3">
            <p class="fw-semibold">Destination Description</p>
        </div>
        <div class="col manage-product-head-table-col pt-3">
            <p class="fw-semibold">Destination Price</p>
        </div>
        <div class="col manage-product-head-table-col pt-3">
            <p class="fw-semibold">Action</p>
        </div>
    </div>
     @foreach ($products as $product)
    <div class="row manage-product-row ps-1">
        <div class="col-1 manage-product-col pt-3">
            <p class="">{{ $product->id }}</p>
        </div>
        <div class="col-2 manage-product-col pt-3">
            <img src="{{Storage::url('/assets/'.$product->image)}}" class="home-card-img-top" alt="" style="width: 100%;">
        </div>
        <div class="col-2 manage-product-col pt-3">
            <p class="">{{ $product->name }}</p>
        </div>
        <div class="col-3 manage-product-col pt-3">
            <p class="">{{ $product->description }}</p>
        </div>
        <div class="col manage-product-col pt-3">
            <p class="">Rp{{ $product->price }}</p>
        </div>
        <div class="col manage-product-col pt-3">
            <div class="row">
                <div class="col">
                    <div class="manage-product-update-btn">
                        <a href="{{ route('edit_product', $product->id) }}" class="btn manage-product-btn btn-primary">Update</a>
                    </div>
                </div>
                <div class="col">
                    <form action="{{ route('product_delete', $product->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger w-100">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
     @endforeach
    <div class="d-flex justify-content-center mt-5">
        {{ $products->links() }}
    </div>
</div>
@endsection
