@extends('layouts.app');

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <h2>Ubah Produk</h2>
                <br>
                <!-- error handling -->
                @if(count($errors))
                <div class="form-group">
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @endif
                <br>
                
                <form action="{{ route('admin.products.update', $product['id']) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label>Nama Produk</label>
                        <input type="text" name="name" class="form-control" placeholder="Nama Produk" value="{{ $product['name'] }}">
                    </div>
                    <div class="form-group">
                        <label>Harga Produk</label>
                        <input type="number" name="price" class="form-control" placeholder="Harga Produk" value="{{ $product['price'] }}">
                    </div>
                    <div class="form-group">
                        <label>Deskripsi Produk</label>
                        <textarea name="description" class="form-control" rows="3" placeholder="Deskripsi" id="ckview">{{ $product['description'] }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Product</button>
                </form>
                
            </div>
        </div>
    </div>
    @endsection

    <script src="{{ url('plugins\tinymce\jquery.tinymce.min.js') }}"></script>
    <script src="{{ url('plugins\tinymce\tinymce.min.js') }}"></script>
    <!-- tinymce js -->
    <script>tinymce.init({ selector:'#ckview' });</script>