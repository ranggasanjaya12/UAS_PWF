@extends('layouts.app')
  
@section('title', 'Product')
  
@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">Edit Product</h1>
        <a href="{{ route('products.index') }}" class="btn btn-primary">Back</a>
    </div>
    <hr />
    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row mb-3">
            <div class="col-md-6 form-group">
                <label >{{ __('Banner') }}</label>
                <input type="file" class="form-control" id="banner" placeholder="{{ __('banner') }}" name="banner" value="{{ old('banner') }}">
            </div>
            <div class="col-md-6 form-group">
                <label for="title">{{ __('Title') }}</label>
                <input type="text" class="form-control" id="title" placeholder="{{ __('Title') }}" name="title" value="{{ old('title', $product->title) }}" />
            </div>
            <div class="col-md-6">
                <label for="category">{{ __('Category') }}</label>
                <select class="form-control" name="category_id" id="category">
                    @foreach ($categories as $category)
                        <option  {{ $category->id === $product->category->id ? 'selected' : null }} value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6 form-group">
                <label for="location">{{ __('Location') }}</label>
                <input type="text" class="form-control" id="location" placeholder="{{ __('Location') }}" name="location" value="{{ old('location', $product->location) }}" />
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6 form-group">
                <label for="shortdesc">{{ __('Short Desc') }}</label>
                <textarea name="shortdesc" class="form-control" id="shortdesc" cols="30" rows="3">{{ old('shortdesc', $product->shortdesc) }}</textarea>
            </div>
            <div class="col">
                <label class="form-label">{{ __('Description') }}</label>
                <textarea name="description" class="form-control" id="description" cols="30" rows="5">{{ old('description', $product->description) }}</textarea>
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button class="btn btn-warning">Update</button>
            </div>
        </div>
    </form>
@endsection