
@extends('layouts.master')
@section('title', 'Detail Katalog')
@section('content')

<div class="container">
    <form action="/Katalog/TambahKeranjang" method="post" clas="form-group">
    @csrf
    <input type="hidden" name="id_produk" value="{{$data->id_produk}}">
        <div class="row">  
            <div class="col-lg-6">
                <div class="col-lg-12 mt-lg-5 ms-lg-5 pt-lg-5 ps-lg-5 pb-lg-4 pb-4">
                    <div class="row d-flex justify-content-center">
                        <a class="row d-flex justify-content-center" data-bs-toggle="modal" data-bs-target="#imageModalPreviewMain">
                            <img src="{{URL('/images/'.$data->photo_produk_1) }}" class="card-img-top" style="width: 300px;" alt="...">
                        </a>
                        
                        <!-- Trigger Modal Gambar Utama -->
                        <div class="modal fade" id="imageModalPreviewMain" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body text-success text-center">                
                                        <img src="{{URL('/images/'.$data->photo_produk_1) }}" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div> 
                    <div class="row d-flex justify-content-center pt-lg-4 pt-4">
                        <div class="col">
                            <a data-bs-toggle="modal" data-bs-target="#imageModalPreview1">
                                <img src="{{URL('/images/'.$data->photo_produk_1) }}" class="card-img-top m-2 border border-light img-fluid" style="width: 90px;" alt="...">
                            </a>
                        </div>
                        <div class="col">
                            <a data-bs-toggle="modal" data-bs-target="#imageModalPreview2">    
                                <img src="{{URL('/images/'.$data->photo_produk_2) }}" class="card-img-top m-2 border border-light img-fluid" style="width: 90px;" alt="...">
                            </a>
                        </div>    
                        <div class="col">    
                            <a data-bs-toggle="modal" data-bs-target="#imageModalPreview3">
                                <img src="{{URL('/images/'.$data->photo_produk_3) }}" class="card-img-top m-2 border border-light img-fluid" style="width: 90px;" alt="...">
                            </a>
                        </div>        
                        <!-- Trigger Modal 1 -->
                        <div class="modal fade" id="imageModalPreview1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body text-success text-center">                
                                        <img src="{{URL('/images/'.$data->photo_produk_1) }}" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Trigger Modal 2 -->
                        <div class="modal fade" id="imageModalPreview2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body text-success text-center">                
                                        <img src="{{URL('/images/'.$data->photo_produk_2) }}" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Trigger Modal 3 -->
                        <div class="modal fade" id="imageModalPreview3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body text-success text-center">                
                                        <img src="{{URL('/images/'.$data->photo_produk_3) }}" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Akhir ketiga Modal -->
                    </div>
                </div>   
            </div>
            <div class="col-lg-6">
                <div class="col-lg-12 col-12 m-lg-5 p-lg-5 p-1 m-1">
                    <p class="fs-2">{{$data->nama_produk}}</p>
                    <p class="fs-2">Rp. {{$data->harga_produk}} / Pcs</p>             
                    <label for="fname" class="">Jumlah</label><br>   
                      
                      <div class="input-group mb-3" style="width:130px;">
                        <span class="input-group-text" id="decrement">-</span>
                        <input type="number" id="counter" name="quantity" class="form-control input-qty" value=1>
                        <span class="input-group-text" id="increment">+</span>
                      </div>
                    <!-- Trigger Modal  Tambah keranjang -->
                    <div class="col-lg-8 py-4">
                        <button class="btn btn-success col-12" type="submit" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambahkan Keranjang</button>
                    </div>   
                    <!-- Modal Tambah Keranjang-->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Produk berhasil ditambahkan!</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body text-success text-center">                
                                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                    <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/>
                                    </svg>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">OK</button>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Modal -->
                </div>   
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <hr class="my-lg-5 col-12">
                <div class="row  p-lg-0 m-lg-0">    
                    <div class="col-lg-4 col-4 ">
                        <img src="{{URL('/images/'. $data->user->photo_profile)}}"  class="rounded-circle " id="image-cover" style="width: 120px; object-fit:cover; object-position:center" alt="">
                    </div>
                    <div class="col-lg-8 col-8 ps-4 ps-lg-0 py-lg-0">
                        <input type="hidden" name="value_nama_toko" id="nama_toko" value="{{$data->user->nama_toko}}">
                        <input type="hidden" name="id_user" id="id_user" value="{{$data->user->id}}">
                        <a class="fs-2" href="{{ route('getSeller', ['id' => $data->user->nama_toko]  )}}" id="valnamatoko">{{$data->user->nama_toko}}</a>
                        <p class="fs-2" >{{$data->user->lokasi_toko}}</p>                      
                    </div>  
                </div>         
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-12 p-3">
                <h4>Detail Produk</h4>
                <p>Kategori : {{$data->kategori->nama_kategori}}</p>
                <p>Varietas Produk : {{$data->varietas_produk}}</p>
                <p>Panen usia : {{$data->panen_usia}}</p>
                <p>Bobot rata-rata{{$data->bobot_rata_rata}}</p>
                <p>Ketahanan suhu ruangan : {{$data->ks_ruangan}}</p>
                <p> Penggunaan pestisida : {{$data->pestisida}}</p>
                <p>Kapasitas produksi : {{$data->kapasitas_produksi}}</p>
                <p>Opsi Pengiriman : {{$data->opsi_pengiriman}}</p>

                <h4>Deskripsi</h4>
                <div class="col-lg-8 col-12">
                    <p>{{$data->deskripsi_produk}}</p>
                </div>
            </div>
        </div>
    </form>    
</div>
<script type="text/javascript" src="{{asset('js/incredeDetail.js') }}"></script>
<!-- <script>

    function gotg() {
        const ab = document.getElementById("get-seller");
        const as = document.getElementById("nama_toko");
        // if (ab && as) {
        //     as.addEventListener("click", function() {
        //         ab.submit();
        //     })
        // }
        as.addEventListener("click", function() {
                ab.submit();
        })
        
    }


</script> -->
@endsection

