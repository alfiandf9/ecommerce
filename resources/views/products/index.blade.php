@extends('layouts.top-nav')

@section('content')
<!-- Page Content -->
<div class="container">
    <div class="col"><br><br>
    <!-- implementasi ajax -->
        <div class="row">
            <div class="col-md-4 offset-md-8">
                <div class="form-group">
                    <select id="order_field" class="form-control">
                        <option value="" disabled selected>Urutkan</option>
                        <option value="best_seller">Best Seller</option>
                        <option value="terbaik">Terbaik</option>
                        <option value="termurah">Termurah</option>
                        <option value="termahal">Termahal</option>
                        <option value="terbaru">Terbaru</option>
                    </select>
                </div>
            </div>
        </div>
        
        <div id="product-list">
        @foreach($products as $idx => $product)
        @if($idx == 0 || $idx % 4 == 0)
            <div class="row mt-4">
        @endif

            <div class="col">
                <div class="card">
                @if(!empty($images))
                    <img src="{{  url('image/view/'.$images[$product->id]->image_src) }}" alt="..." class="card-img-top" width="300px" style="min-height:200px" class="image-responsive">
                @endif
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="{{ route('products.show', ['id' => $product->id]) }}">
                                {{ $product->name }}
                            </a>
                        </h5>
                        <p class="card-text">
                        Rp. {{ number_format($product->price) }} 
                        </p>
                        <a href="{{ route('carts.add', ['id' => $product->id]) }}" class="btn btn-primary">Beli</a>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                    </div>
                </div>
            </div>

        @if($idx > 0 && $idx %4 == 3)
        </div>
        @endif
    @endforeach
    </div>
</div>
<br><br>
<!-- jquery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#order_field').change(function(){
            //window.location.href = '/products/?order_by=' + $(this).val();
            $.ajax({
                type: 'GET',
                url: '/products',
                data: {
                    order_by: $(this).val(),
                },
                dataType: 'json',
                success: function(data){
                    console.log('data:', data);
                    var products = '';
                    $.each(data, function(idx, product){
                        if(idx == 0 || idx % 4 == 0){
                            products += '<div class="row mt-4">';
                        }

                        products += '<div class="col">' +
                            '<div class="card">' +
                                '<img src="/products/image/' + products.image_url + '" class="card-img-top" alt="...">' +
                                    '<div class="card-body">' +
                                        '<h5 class="card-title">' +
                                            '<a href="/products/' + product.id + '">' +
                                            product.name +
                                            '</a>' +
                                        '</h5>' +
                                        '<p class="card-text"> Rp. ' +
                                            product.price +
                                        '</p>' +
                                            '<a href="/carts/add/' + product.id + '" class="btn btn-primary">Beli</a>' +
                                    '</div>' +
                                    '<div class="card-footer">' +
                                        '<small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>' +
                                    '</div>' +
                                '</div>' +
                            '</div>';
                        
                        if(idx > 0 && idx % 4 == 3){
                            products += '</div>';
                        }
                    });

                    //update element
                    $('#product-list').html(products);
                },
                error: function(data){
                    alert('Ubable to handle request');
                }
            });
        });
    });
</script>
@endsection