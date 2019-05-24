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
                       Data Produk
                    </div>
                </div>
                <div class="box-body">
                <!-- Content -->
                <div class="box-header">
                    <a href="{{ route('admin.products.create') }}" class="btn btn-success"><i class="fa fa-plus-circle"></i> Tambah Produk</a>
                </div>
                <hr>
                <table class="table table-bordered table-hovered table-striped" id="example1">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Produk</th>
                            <th>Harga Produk</th>
                            <th>Gambar Produk</th>
                            <th>Review Produk</th>
                            <th>Tanggal Masuk</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $no = 1;?>
                        @foreach($products as $product)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $product->name }}</td>
                                <td>Rp. {{ number_format($product->price) }}</td>
                                <td></td>
                                <td></td>
                                <!-- <td> $product_reviews[]->rating </td> -->
                                <td>{{ $product->created_at }}</td>
                                <td>
                                <div class="btn-group">
                                    <div class="col-md-4 custom" style="padding-right: 4px;padding-left: 4px;">
                                        <a href="{{ route('admin.products.show', $product->id) }}" class="btn btn-info"><i class="fa fa-eye"></i> Lihat</a>
                                    </div>
                                    <div class="col-md-4 custom" style="padding-right: 4px;padding-left: 4px;">
                                        <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-primary"><i class="fa fa-edit"></i> Ubah</a>
                                    </div>
                                    <div class="col-md-4 custom" style="padding-right: 4px;padding-left: 4px;">
                                        <form action="{{ route('admin.products.destroy', $product->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit" onclick="return confirm('Apakah anda yakin ?')"><i class="fa fa-trash-o"></i> Hapus</button>
                                        </form>
                                    </div>
                                </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection