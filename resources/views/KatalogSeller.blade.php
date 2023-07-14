@extends('layouts.master')

@section('content')
<div class="container">
    @foreach($userSeller as $user) 
    <div class="row p-3">
        <div class="col-lg-6 col-12 text-center">
            <h3 class="pt-4">Katalog</h3>
            <h7>Sayur yang dimiliki {{$user->nama_toko}} ada disini!</h7>
        </div>
    </div>  
    <div class="row p-1 p-lg-0 m-lg-0" id="seller">
        <div class="col-lg-2 col-6 ps-lg-5 py-lg-0">         
            <img src="{{URL('/images/'. $user->photo_profile)}}"  class="rounded-circle" id="image-cover" style="width: 120px; object-fit:cover; object-position:center" alt="">               
        </div>
        <div class="col-lg-10 col-6">
            <p class="fs-2" id="nama_toko">{{$user->nama_toko}}</p>
            <p class="fs-2 ">{{$user->lokasi_toko}}</p>
        </div>            
    </div>
    @endforeach
    <div class="row pt-4" id="all-data">
        @foreach($data_produk as $row)
        <div class="col-lg-3 col-6 py-2 d-flex justify-content-center">
            <div class="card" style="width: 10rem;">
                <img src="{{URL('/images/'.$row->photo_produk_1) }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{$row->nama_produk}}</h5>
                    <p class="card-text">Rp. {{$row->harga_produk}}</p>
                    <p class="card-text">{{$row->user->lokasi_toko}}</p>     
                    <div class="row">    
                        <div class="col-12 px-1 d-flex flex-row-reverse">
                            <a href="{{route ('produkDetail', $row->id_produk) }}" class="btn btn-success">Pesan</a>
                        </div>
                    </div>            
                </div>
            </div>
        </div>
        @endforeach
        <div class="row p-5">
            <div class="col-12 d-flex justify-content-center">
                {{ $data_produk->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
    <div class="row" id="search-data">
    @if ($data_produk->isEmpty())
        <p>No Produk found.</p>
    @else
    
    @endif
    </div> 
</div>

@endsection