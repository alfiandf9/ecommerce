@extends('layouts.top-nav')

@section('content')
<div class="container"><br><br>
    <div class="col-md-12">
        <table id="cart" class="table table-hover table-condensed">
            <thead>
                <tr>
                    <th>Produk</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Subtotal</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $total = 0 ?>

                @if(session('cart'))
                <?php
                    // var_dump(session('cart'));
                    // exit();
                ?>
                @foreach(session('cart') as $id => $product)

                <?php $total += $product['price'] * $product['quantity'] ?>
                
                <tr>
                    <td data-th="Product">
                        <div class="row">
                            <div class="col-sm-3" hidden-xs>
                                <img src="{{ asset('images/'.$product['image_url']) }}" alt="..." class="card-img-top" width="100" style="100" class="image-responsive">          
                            </div>
                            <div class="col-sm-6">
                                <h4 class="nomargin">{{ $product['name'] }}</h4>
                            </div>
                        </div>
                    </td>
                    <td data-th="Price">{{ number_format($product['price']) }}</td>
                    <td data-th="Quantity">
                        <input type="number" value="{{ $product['quantity'] }}" class="form-control quantity">
                    </td>
                    <td data-th="Subtotal">{{ number_format($product['price'] * $product['quantity']) }}</td>
                    <td class="action" data-th="">
                        <div class="btn-group">
                            <button class="btn btn-info btn-sm update-cart" data-id="{{ $id }}" style="padding-right: 10px;padding-left: 10px;"><i class="fa fa-plus"></i></button>
                            <button class="btn btn-danger btn-sm  remove-from-cart" data-id="{{ $id }}" style="padding-right: 10px;padding-left: 10px;"><i class="fa fa-close"></i></button>
                        </div>
                    </td>
                </tr>
                @endforeach
                @endif
            </tbody>
            <tfoot>
                <tr class="visible-xs">
                    <td class="text-center"><strong>Total Rp. {{ number_format($total) }}</strong></td>
                </tr>
                <tr>
                    <td>
                        <a href="{{ url('/products') }}" class="btn btn-success"><i class="fa fa-cart-plus"></i> Lanjutkan Belanja</a>
                        <a href="{{ route('admin.orders.create') }}" class="btn btn-info"><i class="fa fa-money"></i> Bayar</a>
                    </td>
                    <td colspan="2" class="hidden-xs"></td>
                    <td class="hidden-xs"><strong>Total {{ number_format($total) }}</strong></td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

<!-- jquery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $(".update-cart").click(function (e){
            e.preventDefault();
            var ele = $(this);

            $.ajax({
                url: '{{ route('carts.update') }}',
                method: "patch",
                data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id"), quantity: ele.parents("tr").find(".quantity").val()},
                success: function(response){
                    window.location.reload();
                }
            });
        });

        $(".remove-from-cart").click(function (e){
            e.preventDefault();
            var ele = $(this);

            if(confirm("Apakah anda yakin?")) {
                $.ajax({
                    url: '{{ route('carts.remove') }}',
                    method: "DELETE",
                    data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                    success: function(response){
                        window.location.reload();
                    }
                });
            }
        });
    });
</script>
@endsection