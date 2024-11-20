@extends('layouts.app')
  
@section('title', 'Offer')
  
@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">Edit Offer</h1>
        <a href="{{ route('offers.index') }}" class="btn btn-primary">Back</a>
    </div>
    <hr />
    <form action="{{ route('offers.update', $offer->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Title</label>
                <input type="file" class="form-control" id="banner" placeholder="{{ __('banner') }}" name="banner" value="{{ old('banner', $offer->banner) }}" >
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button class="btn btn-warning">Update</button>
            </div>
        </div>
    </form>
@endsection