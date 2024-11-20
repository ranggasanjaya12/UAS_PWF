@extends('layouts.app')
  
@section('title', 'Blog')
  
@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">List Blog</h1>
        <a href="{{ route('postblogs.create') }}" class="btn btn-primary">Add Blog</a>
    </div>
    <hr />
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
    <table class="table table-hover">
        <thead class="table-primary">
            <tr>
                <th>#</th>
                <th>Thumbnail</th>
                <th>Title</th>
                <th>Category</th>
                {{-- <th>Product Code</th> --}}
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @if($postblogs->count() > 0)
                @foreach($postblogs as $postblog)
                    <tr>
                        <td class="align-middle">{{ $loop->iteration }}</td>
                        <td class="align-middle"><img src="{{ Storage::url($postblog->thumbnail) }}" width="200" alt=""></td>
                        <td class="align-middle">{{ $postblog->title }}</td>
                        <td class="align-middle">{{ $postblog->catblog->name }}</td>
                        {{-- <td class="align-middle">{{ $product->shortdesc }}</td> --}}
                        <td class="align-middle">{{ $postblog->description }}</td>
                        <td class="align-middle">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                {{-- <a href="{{ route('sliders.show', $rs->id) }}" type="button" class="btn btn-secondary">Detail</a> --}}
                                <a href="{{ route('postblogs.edit', $postblog->id)}}" type="button" class="btn btn-warning">Edit</a>
                                <form action="{{ route('postblogs.destroy', $postblog->id) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Delete?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger m-0">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td class="text-center" colspan="5">Blog not found</td>
                </tr>
            @endif
        </tbody>
    </table>
@endsection