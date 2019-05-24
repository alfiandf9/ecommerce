@extends('layouts.app')

@section('content')
<section class="content-header">
      <h1>
        Order
        <small>Detail Order</small>
      </h1>
    </section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-success">
                <div class="box-header">
                    <div class="box-title">
                       Detail Pembelian
                    </div>
                    <hr>
                </div>
                <div class="box-body">
                <!-- Content -->
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col">
                            <div class="row">
                                <h2>
                                    <i class="badge badge-primary">Alamat Pengiriman</i>
                                </h2>
                                <p>
                                    {{ $order->shipping_address }}
                                </p>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <h2>
                                        <span class="badge badge-primary">Kode Pos</span>
                                    </h2>
                                    <p>
                                        {{ $order->zip_code }}
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <h2>
                                        <span class="badge badge-primary">Total Harga</span>
                                    </h2>
                                    <p>
                                       Rp. {{ number_format($order->total_price) }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

            <div class="row justify-content-center">
                <div class="col">
                    <table id="example2" class="table table-bordered table-hovered table-striped">
                        <thead>
                            <tr>
                                <th styles="width:1%">#</th>
                                <th styles="width:50%">Produk</th>
                                <th styles="width:10%">Harga Produk</th>
                                <th styles="width:8%">Jumlah Beli</th>
                                <th styles="width:22%">Subtotal</th>
                            </tr>
                        </thead>
                        @php
                            $no = 1
                        @endphp
                        <tbody>
                            @foreach($order->orderItems as $orderItem)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td data-th="Product">
                                    <div class="row">
                                        <div class="col-sm-3 hiddens-xs">
                                            <img src="{{ asset('images/'.$product[0]->image_url) }}" alt="..." class="card-img-top" width="100" style="100" class="image-responsive">
                                        </div>
                                        <div class="col-sm-9">
                                            <a href="{{ route('products.show', ['id'=> $orderItem->product->id]) }}">
                                                <h4 class="nomargin">{{ $orderItem->product->name }}</h4>
                                            </a>
                                        </div>
                                    </div>
                                </td>
                                <td data-th="Price">
                                Rp. {{ number_format($orderItem->price) }}
                                </td>
                                <td data-th="Quantity">
                                    {{ $orderItem->quantity }}
                                </td>
                                <td data-th="subtotal">
                                    Rp. {{ number_format($orderItem->price * $orderItem->quantity) }}
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            <div class="box-footer">
            <a href="{{ route('admin.orders.index') }}" class="btn btn-success"><i class="fa fa-arrow-circle-o-left"></i> Kembali</a>
            </div>
        </div>
    </div>
</section>
@endsection