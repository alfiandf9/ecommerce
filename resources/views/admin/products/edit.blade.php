@extends('layouts.app')

@section('content')
<section class="content-header">
      <h1>
        Produk
        <small>Ubah Produk</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">Form Ubah Produk</h3>

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
                <form action="{{ route('admin.products.update', $product['id']) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label>Nama Produk</label>
                        <input type="text" name="name" class="form-control" placeholder="Nama Produk" value="{{ $product['name'] }}">
                    </div>
                    <label>Harga Produk</label>
                    <div class="input-group">
                        <span class="input-group-addon">Rp</span>
                        <input type="number" name="price" class="form-control" placeholder="Harga Produk" value="{{ $product['price'] }}">
                        <span class="input-group-addon">.00</span>
                    </div><br>
                    <div class="form-group">
                        <label>Gambar Produk</label>
                        <input type="file" class="form-control-file" name="image">
                    </div>
                    <div class="form-group">
                        <label>Deskripsi Produk</label>
                        <textarea name="description" class="form-control" rows="3" placeholder="Deskripsi" id="ckview">{{ $product['description'] }}</textarea>
                    </div>
            <!-- /.box-body -->
            <div class="box-footer">
                    <a href="{{ route('admin.products.index') }}"><button type="button" class="btn btn-default">Kembali</button></a>
                    <button type="submit" class="btn btn-success pull-right">Ubah</button>
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
    <script>tinymce.init({ selector:'#ckview' });</script>