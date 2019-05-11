@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="row">
                <div class="col">
                    <h2>
                        <span class="badge badge-primary">Alamat Pengiriman</span>
                    </h2>
                    <p>
                        {{ $order->shipping_address }}
                    </p>
                </div>
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
                        {{ $order->total_price }}
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col">
            <table id="cart" class="table table-hover table-condensed">
                <thead>
                    <tr>
                        <th styles="width:50%">Product</th>
                        <th styles="width:10%">Price</th>
                        <th styles="width:8%">Quantity</th>
                        <th styles="width:22%" class="text-center">Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order->orderItems as $orderItem)
                    <tr>
                        <td data-th="Product">
                            <div class="row">
                                <div class="col-sm-3 hiddens-xs">
                                @if(!empty($images))
                                    <img src="{{  url('image/view/'.$images[$orderItem->product->id]->image_src) }}" alt="..." class="card-img-top" width="100" style="100" class="image-responsive">
                                @endif
                                </div>
                                <div class="col-sm-9">
                                    <a href="{{ route('products.show', ['id'=> $orderItem->product->id]) }}">
                                        <h4 class="nomargin">{{ $orderItem->product->name }}</h4>
                                    </a>
                                </div>
                            </div>
                        </td>
                        <td data-th="Price">
                            {{ $orderItem->price }}
                        </td>
                        <td data-th="Quantity">
                            {{ $orderItem->quantity }}
                        </td>
                        <td data-th="subtotal" class="text-center">
                            {{ $orderItem->price * $orderItem->quantity }}
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection