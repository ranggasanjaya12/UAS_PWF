@extends('layouts.app')
  
@section('title', 'Create Category')
  
@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">Add Category Blog</h1>
        <a href="{{ route('catblogs.index') }}" class="btn btn-primary">Back</a>
    </div>
    <hr />
    <form action="{{ route('catblogs.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            <div class="col-md-6 form-group">
                <label for="name">{{ __('Category') }}</label>
                <input type="text" class="form-control" id="name" placeholder="{{ __('Category') }}" name="name" value="{{ old('name') }}" />
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection