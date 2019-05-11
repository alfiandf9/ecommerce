@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h2>Image Gallery</h2>
                @auth
                <a href="{{ route('image_insert', $id) }}" class="btn btn-primary">Add Image</a>
                <a href="{{ route('admin.products.index') }}" class="btn btn-primary">Kembali</a>
                @endauth
                <a href="{{ route('admin.products.index') }}" class="btn btn-primary">Kembali</a>
                <hr>
        </div>

        @if(!empty($images))
            @foreach($images as $val)
            <div class="col-md-4" align="center">
                <img src="{{ url('image/view/'.$val->image_src)}}" class="img-thumbnail" width="300">
                <b>{{ $val->image_title }}</b>
            </div>
            @endforeach
        @endif
    </div>
</div>
@endsection