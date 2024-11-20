@extends('layouts.app')
  
@section('title', 'Create Slider')
  
@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">Add Slider</h1>
        <a href="{{ route('sliders.index') }}" class="btn btn-primary">Back</a>
    </div>
    <hr />
    <form action="{{ route('sliders.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            <div class="col-md-6 form-group">
                <label class="form-label">Banner</label>
                <input type="file" class="form-control" id="banner" placeholder="{{ __('banner') }}" name="banner" value="{{ old('banner') }}">
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection