@extends('layouts.app')
  
@section('title', 'Category')
  
@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">Edit Category Blog</h1>
        <a href="{{ route('catblogs.index') }}" class="btn btn-primary">Back</a>
    </div>
    <hr />
    <form action="{{ route('catblogs.update', $catblog->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-6 form-group">
                <label for="name">{{ __('Name') }}</label>
                <input type="text" class="form-control" id="name" placeholder="{{ __('Name') }}" name="name" value="{{ old('name', $catblog->name) }}" />
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button class="btn btn-warning">Update</button>
            </div>
        </div>
    </form>
@endsection