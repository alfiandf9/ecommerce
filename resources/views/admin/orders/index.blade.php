@extends('layouts.app')

@section('content')
<section class="content-header">
      <h1>
        Produk
        <small>Order Produk</small>
      </h1>
    </section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-success">
                <div class="box-header">
                    <div class="box-title">
                       List Order Produk
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
                            <th>Harga Total</th>
                            <th>Status</th>
                            <th>Kode Pos</th>
                            <th>Alamat Pengiriman</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                        <tr>
                            <td>{{ $order['id'] }}</td>
                            <td>{{ $order['total_price'] }}</td>
                            <td>{{ $order['status'] }}</td>
                            <td>{{ $order['zip_code'] }}</td>
                            <td>{{ $order['shipping_address'] }}</td>
                            <td>
                                <a href="{{ route('admin.orders.show', ['id' => $order['id']]) }}" class="btn btn-success"><i class="fa fa-eye"></i> Lihat</a>
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