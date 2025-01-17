@extends('layouts.app')
  
@section('title', 'Slider')
  
@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">List Slider</h1>
        <a href="{{ route('sliders.create') }}" class="btn btn-primary">Add Slider</a>
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
                {{-- <th>Price</th>
                <th>Product Code</th>
                <th>Description</th> --}}
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @if($sliders->count() > 0)
                @foreach($sliders as $slider)
                    <tr>
                        <td class="align-middle">{{ $loop->iteration }}</td>
                        <td class="align-middle"><img src="{{ Storage::url($slider->banner) }}" width="200" alt=""></td>
                        {{-- <td class="align-middle">{{ $rs->price }}</td>
                        <td class="align-middle">{{ $rs->product_code }}</td>
                        <td class="align-middle">{{ $rs->description }}</td>   --}}
                        <td class="align-middle">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                {{-- <a href="{{ route('sliders.show', $rs->id) }}" type="button" class="btn btn-secondary">Detail</a> --}}
                                <a href="{{ route('sliders.edit', $slider->id)}}" type="button" class="btn btn-warning">Edit</a>
                                <form action="{{ route('sliders.destroy', $slider->id) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Delete?')">
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
                    <td class="text-center" colspan="5">Slider not found</td>
                </tr>
            @endif
        </tbody>
    </table>
@endsection