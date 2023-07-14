<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProdukController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showProduk(Request $request) {
    
        $data = Produk::with('user')
        ->when($request->has('lokasiSort') && $request->lokasiSort != null, function($query) use ($request) {
            $query->whereRelation('user','lokasi_toko', $request->lokasiSort);
        })->orderBy('updated_at','desc')->paginate(8);

        return view('katalog', compact('data'));
        
    }

    public function showDetail($id) {
        
        $get = Produk::with('user')->with('kategori')->find($id);
    
        return view('katalogDetail', ['data'=> $get]); 
    }

    public function search(Request $request) {
        
        $output="";
        $produk=Produk::with('user')
        ->where('nama_produk','Like','%'.$request->search.'%')
        ->orWhere('harga_produk','Like','%'.$request->search.'%')
        ->orwhereRelation('user','lokasi_toko','Like','%'.$request->search.'%')
        ->orwhereRelation('user','nama_toko','Like','%'.$request->search.'%')
        ->orderBy('updated_at','desc')->paginate(8);
        
        foreach($produk as $data){
       
            $output.=

            ' 
            <div class="col-lg-3 col-6 py-2 d-flex justify-content-center">
                <div class="card" style="width: 10rem;">
                    <img src="/images/'.$data->photo_produk_1.' " class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">'.$data->nama_produk.'</h5>
                        <p class="card-text">Rp. '.$data->harga_produk.'</p>
                        <p class="card-text"> '.$data->user->lokasi_toko.' </p>                        
                        <div class="row">    
                            <div class="col-12 px-1 d-flex flex-row-reverse">                              
                                <a href="/Katalog/'.$data->id_produk.' "class="btn btn-success">Pesan</a>                 
                            </div>
                        </div>            
                    </div>
                </div>
            </div>

            ';
        }

        return response($output);
    }

    public function sellerKatalog($id) {
          
        $userSeller = User::where('nama_toko', $id)->get(); // get profile toko //       
        $id_toko = User::where('nama_toko', $id)->value('id'); // $id_toko = $userSeller[0]; (cadangan get id toko)      
        $data_produk = Produk::where('id_user', $id_toko)->with('user')->paginate(8); //get data katalog dari toko //
        
        return view('katalogSeller', compact('userSeller','data_produk'));
    }

    


}