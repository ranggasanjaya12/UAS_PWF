@extends('layouts.app')
  
@section('title', 'Product')
  
@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">List Product</h1>
        <a href="{{ route('products.create') }}" class="btn btn-primary">Add Product</a>
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
                <th>Banner</th>
                <th>Title</th>
                <th>Category</th>
                <th>Location</th>
                {{-- <th>Short Desc</th> --}}
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @if($products->count() > 0)
                @foreach($products as $product)
                    <tr>
                        <td class="align-middle">{{ $loop->iteration }}</td>
                        <td class="align-middle"><img src="{{ Storage::url($product->banner) }}" width="200" alt=""></td>
                        <td class="align-middle">{{ $product->title }}</td>
                        <td class="align-middle">{{ $product->category->name }}</td>
                        <td class="align-middle">{{ $product->location }}</td>
                        {{-- <td class="align-middle">{{ $product->shortdesc }}</td> --}}
                        <td class="align-middle">{{ $product->description }}</td>
                        <td class="align-middle">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                {{-- <a href="{{ route('sliders.show', $rs->id) }}" type="button" class="btn btn-secondary">Detail</a> --}}
                                <a href="{{ route('products.edit', $product->id)}}" type="button" class="btn btn-warning">Edit</a>
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Delete?')">
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
                    <td class="text-center" colspan="7">Product not found</td>
                </tr>
            @endif
        </tbody>
    </table>
@endsection