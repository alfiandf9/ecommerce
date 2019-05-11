@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
            <div class="col">
                <h2>Tambah Gambar</h2>
            <form action="{{ route('image_save')}}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="form-group">
                    <input type="hidden" name="product_id" class="form-control" value="{{ $id }}">
                </div>
                <div class="form-group">
                    <label>Image Title</label>
                    <input type="text" name="image_title" class="form-control">
                </div>
                <div class="form-group">
                    <label>Image Desc</label>
                    <textarea name="image_desc" id="ckview"></textarea>
                </div>
                <div class="form-group">
                    <label>Upload</label>
                    <input type="file" name="image_src" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Save Image</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

<script src="{{ url('plugins\tinymce\jquery.tinymce.min.js') }}"></script>
    <script src="{{ url('plugins\tinymce\tinymce.min.js') }}"></script>
    <!-- tinymce js -->
    <script>tinymce.init({ selector:'#ckview' });</script>