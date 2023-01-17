@extends('layout.template')
@section('css', '/css/addproduct.css')
@section('title', 'Add Product')

@section('content')
<div class="add-product-body-container">
    <div class="add-product-body-content">
        <div class="col">
            <div class="row">
                <h1 class="add-product-title">Add Ticket Destination</h1>
            </div>
            <div class="row">
                <form action="{{ route('product_add') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-item">
                        <input type="text" name="name" id="name" placeholder="Product Name" autocomplete="off">
                    </div>
                    <div class="form-item">
                        <textarea name="description" id="description" cols="30" rows="10"
                                  placeholder="Product Description" autocomplete="off"></textarea>
                    </div>
                    <div class="form-item">
                        <input type="number" name="price" id="price" placeholder="Price" autocomplete="off">
                    </div>
                    <div class="form-item">
                        <input type="number" name="year" id="year" placeholder="Released Year" autocomplete="off">
                    </div>
                    <div class="form-item">
                        <label for="existing-image"></label>
                        <input type="file" name="image" id="image">
                    </div>
                    <button class="add-product-button" type="submit">Add Product</button>
                    @if($errors->any())
                        <div class="alert alert-danger my-2 p-3">
                            <ul>
                                @foreach($errors->all() as $error_data)
                                    <li> {{ $error_data }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
