@extends('admin.base')

@section ('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 mt-15">
    <div class="card">
        <div class="card-header">
            Detail Data Produk
</div>
<div class="card-body">
    <h3>{{$produk->nama}}</h3>
    <hr>
    <p>
        Rp. {{number_format($produk->harga)}}
        stok : {{$produk->stok}}
        Seller :{{ $produk->seller->nama }}
    </p>
    <p>
        {{$produk->deskripsi}}
</p>
 </div>
 </div>
 </div>
</div>
</div>
@endsection