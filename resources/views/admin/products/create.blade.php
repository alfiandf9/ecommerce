@extends('layouts.app')

@section('content')
<section class="content-header">
      <h1>
        Produk
        <small>Tambah Produk</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">Form Tambah Produk</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
            <div class="col">
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
                <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Nama Produk</label>
                        <input type="text" name="name" class="form-control" placeholder="Nama Produk">
                    </div>
                    <label>Harga Produk</label>
                    <div class="input-group">
                        <span class="input-group-addon">Rp</span>
                        <input type="number" name="price" class="form-control" placeholder="Harga Produk">
                        <span class="input-group-addon">.00</span>
                    </div><br>
                    <div class="form-group">
                        <label>Gambar</label>
                        <input type="file" class="form-control-file" name="image">
                    </div>
                    <!-- /.col -->
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea name="description" class="form-control" rows="3" placeholder="Deskripsi" id="ckview"></textarea>
                    </div>
                </div>
            <!-- /.box-body -->
            <div class="box-footer">
                    <a href="{{ route('admin.products.index') }}"><button type="button" class="btn btn-default"><i class="fa fa-arrow-circle-o-left"></i> Kembali</button></a>
                    <button type="submit" class="btn btn-success pull-right"><i class="fa fa-save"></i> Simpan</button>
            </div>
            <!-- /.box-footer -->
            </form>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    @endsection

    <script src="{{ url('plugins\tinymce\jquery.tinymce.min.js') }}"></script>
    <script src="{{ url('plugins\tinymce\tinymce.min.js') }}"></script>
    <!-- tinymce js -->
    <script>tinymce.init({ selector:'#ckview' })</script>