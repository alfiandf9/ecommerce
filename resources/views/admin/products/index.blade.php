@extends('layouts.app')

@section('content')
<div class="container col-md-8">
    <div class="row justify-content-center">
        <div class="col">
            <h2>Product</h2>
            <div>
            @auth
                <a href="{{ route('admin.products.create') }}" class="btn btn-primary">Tambah Produk</a>
            @endauth
            </div>
            <br>
            <div class="table-responsive">
                <table class="table table-stripped table-sm">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Created at</th>
                            <th></th>
                            <th>Action</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $no = 1 ?>
                        @foreach($products as $product)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->created_at }}</td>
                                @auth 
                                <td><a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-light">Ubah</a></td>
                                <td>
                                    <form action="{{ route('admin.products.destroy', $product->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-light" type="submit" onclick="return confirm('Apakah anda yakin ?')">Hapus</button>
                                    </form>
                                </td>
                                @endauth
                                <td><a href="{{ route('admin.products.show', $product->id) }}" class="btn btn-light">Lihat</a></td>
                                
                                <td><a href="{{ route('image', $product->id) }}" class="btn btn-light">Lihat Gambar</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection