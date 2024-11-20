@extends('layouts.app')
  
@section('title', 'Create Blog')
  
@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">Add Blog</h1>
        <a href="{{ route('postblogs.index') }}" class="btn btn-primary">Back</a>
    </div>
    <hr />
    <form action="{{ route('postblogs.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            <div class="col-md-4 form-group">
                <label>{{ __('Thumbnail') }}</label>
                <input type="file" class="form-control" id="thumbnail" placeholder="{{ __('thumbnail') }}" name="thumbnail" value="{{ old('thumbnail') }}">
            </div>
            <div class="col-md-4 form-group">
                <label for="title">{{ __('Title') }}</label>
                <input type="text" class="form-control" id="title" placeholder="{{ __('Title') }}" name="title" value="{{ old('title') }}" />
            </div>
            <div class="col-md-4">
                <label for="catblog">{{ __('Category') }}</label>
                <select class="form-control" name="catblog_id" id="catblog">
                    @foreach ($catblogs as $catblog)
                        <option value="{{ $catblog->id }}">{{ $catblog->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        
        <div class="row mb-3">
            <div class="col-md-6 form-group">
                <label for="exceprt">{{ __('Exceprt') }}</label>
                <textarea name="exceprt" class="form-control" id="exceprt" cols="30" rows="5">{{ old('exceprt') }}</textarea>
            </div>
            <div class="col">
                <label class="form-label">{{ __('Description') }}</label>
                <textarea name="description" class="form-control" id="description" cols="30" rows="5">{{ old('description') }}</textarea>
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection