@extends('layouts.master')

@section('content')
<div class="container">
  <div class="row pb-4">
    <div class="col-lg-12 col-12 text-center">
      <h3 class="pt-4">Keranjang</h3>
      <h7>Sayur yang kamu masukan keranjang ada disini</h7>
    </div>
  </div>
    <div class="row d-flex justify-content-center">      
    @php
    $tokoProduk = [];
    @endphp
    
    @foreach ($data as $dk)
      @php
      $namaToko = $dk->produk->user->nama_toko;
      @endphp
          
      @if (!in_array($namaToko, $tokoProduk))
        @php
        $tokoProduk[] = $namaToko;
        @endphp
        <form action="{{route ('chatWhatsapp') }}" id="chatwhatsapp" method="get">
          @csrf
          <div class="col-lg-12 col-12 pb-2 d-flex justify-content-center">
            <div class="col-lg-6 col-12 d-flex justify-content-center ">
              <div class="row ps-2 pe-2">     
                <div class="col-lg-8 pt-4 d-flex flex-row">
                  <p>{{$dk->produk->user->nama_toko}}</p>
                </div>
                @foreach($data as $dx)
                  @if($dx->produk->user->nama_toko === $dk->produk->user->nama_toko)
                  <div class="card">        
                    <div class="row keranjang_data">          
                      <div class ="col-lg-4 col-5 pe-2">
                        <img class="card-img-top" src="{{URL('/images/'. $dx->produk->photo_produk_1)}}" style="width: 150px;" alt="Card image cap">
                      </div>        
                      <div class="col-lg-4 col-7">
                        <div class="container ps-4">
                          <div class="card-body ">
                            <input type="hidden" name="id_keranjang" id="id_keranjang" value="{{$dx->id_keranjang}}">
                            <input type="hidden" name="id_user" id="id_user" value="{{$dx->id}}">
                            <h5 class="card-text">{{$dx->produk->nama_produk}}</h5>
                            <p class="card-text">{{$dx->produk->harga_produk}} / Pcs</p>
                            <label for="fname" class="">Jumlah</label><br>   
                            <!-- <input type="number" id="quantity" class="form-control text-center input-qty bg-white" name="quantity" value=1> -->
                            <div class="input-group mb-3" style="width:130px;">
                              <button class="input-group-text decrement-btn">-</button>
                              <input type="number" class="form-control input-qty" value="{{$dx->qty_produk}}">
                              <button class="input-group-text increment-btn">+</button>
                            </div> 
                              <!-- <label for="fname" class="">Jumlah</label><br>                            
                              <button class="buttoncount" id="increment">+</button>
                              <span id="counter">{{$dk->qty_produk}}</span>   
                              <button class="buttoncount" id="decrement">-</button> -->
                          </div>
                        </div>
                      </div>  
                      <div class="col-lg-4 col-12 pt-3 pb-4 d-flex justify-content-end">
                        <a class="btn btn-danger col-4" style="font-size: 12px;" href="{{route ('DeleteDataKeranjang', $dk->id_keranjang)}}">Delete</a>   
                      </div>
                    </div>
                  </div>
                  @endif
                @endforeach
                <div class="col-lg-12 col-12 pt-3 pb-4 d-flex justify-content-end">
                  <button class="btn btn-success col-12" type="submit" style="margin-top: 20px;"  >Chat Whatsapp</button>
                </div>
              </div>
            </div>  
          </div>
        </form>  
      @endif
    @endforeach
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
$(".increment-btn").click(function (e) {
    e.preventDefault();
    var idk = $(this).closest(".keranjang_data").find("#id_keranjang").val();
    var qty_old = $(this).closest(".keranjang_data").find(".input-qty").val();

    var values = parseInt(qty_old);

    values = isNaN(values) ? 0 : values;
    values++;
    $(this).closest(".keranjang_data").find(".input-qty").val(values);

    $.ajax({
        type: "get",
        url: "updateQtyCart",
        data: { qty: values, id_keranjang: idk },

        success: function (data) {
            console.log(data);
        },
    });
});

$(".decrement-btn").click(function (e) {
    e.preventDefault();
    var idk = $(this).closest(".keranjang_data").find("#id_keranjang").val();
    var qty_old = $(this).closest(".keranjang_data").find(".input-qty").val();

    var values = parseInt(qty_old);

    values = isNaN(values) ? 0 : values;
    if (values > 1) {
        values--;
        $(this).closest(".keranjang_data").find(".input-qty").val(values);
    }

    $.ajax({
        type: "get",
        url: "updateQtyCart",
        data: { qty: values, id_keranjang: idk },

        success: function (data) {
            console.log(data);
        },
    });
});


</script>
@endsection