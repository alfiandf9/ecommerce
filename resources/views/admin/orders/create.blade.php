@extends('layouts.top-nav')

@section('content')
<div class="container"><br><br>
    <div class="row justify-content-center">
        <div class="col">
            <h2>Alamat Pengiriman</h2>
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
            <br>

            <form action="{{ route('admin.orders.store') }}" method="POST">
            @csrf
                <div class="form-group">
                    <label>Alamat Pengiriman</label>
                    <textarea name="shipping_address"  rows="3" class="form-control" placeholder="Alamat Pengiriman"></textarea>
                </div>
                <div class="form-group">
                    <label>Kode Pos</label>
                    <input type="number" name="zip_code" class="form-control" placeholder="Kode Pos">
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection