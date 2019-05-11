@extends('layouts.app');

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <h2>Tambah Produk</h2>
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
                <form action="{{ route('admin.products.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Nama Produk</label>
                        <input type="text" name="name" class="form-control" placeholder="Nama Produk">
                    </div>
                    <div class="form-group">
                        <label>Harga Produk</label>
                        <input type="number" name="price" class="form-control" placeholder="Harga Produk">
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea name="description" class="form-control" rows="3" placeholder="Deskripsi" id="ckview"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
    @endsection

    <script src="{{ url('plugins\tinymce\jquery.tinymce.min.js') }}"></script>
    <script src="{{ url('plugins\tinymce\tinymce.min.js') }}"></script>
    <!-- tinymce js -->
    <script>tinymce.init({ selector:'#ckview' });</script>