@extends('layouts.app')

@section('content')
<section class="content-header">
      <h1>
        Produk
        <small>Data Produk</small>
      </h1>
    </section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-success">
                <div class="box-header">
                    <div class="box-title">
                       Detail Barang
                    </div>
                </div>
                <div class="box-body">
                <!-- Content -->
                <div class="box-header">
                    <a href="{{ route('admin.products.index') }}" class="btn btn-success"><i class="fa fa-arrow-circle-o-left"></i> Kembali</a>
                </div>
                <hr>
                <table class="table table-bordered table-hovered table-striped" id="example2">
                    <thead>
                        <th>#</th>
                        <th>Nama Produk</th>
                        <th>Harga Produk</th>
                        <th>Gambar Produk</th>
                        <th>Deskripsi Produk</th>
                    </thead>
                    <?php $no = 1 ?>
                    <tbody>
                        <td>{{ $no++ }}</td>
                        <td>{{ $product->name }}</td>
                        <td>Rp. {{ number_format($product->price, 2) }}</td>
                        <td>
                        @if(!empty($images))
                            @foreach($images as $val)
                            <div class="col-md-4" align="center">
                                <img src="{{ url('image/view/'.$val->image_src)}}" class="img-thumbnail" width="300">
                                <b>{{ $val->image_title }}</b>
                            </div>
                            @endforeach
                        @endif
                        </td>
                        <td>{{ strip_tags($product->description) }}</td>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection