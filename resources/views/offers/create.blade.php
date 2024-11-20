@extends('layouts.app')
  
@section('title', 'Create Offer')
  
@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">Add Offer</h1>
        <a href="{{ route('offers.index') }}" class="btn btn-primary">Back</a>
    </div>
    <hr />
    <form action="{{ route('offers.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            <div class="col">
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