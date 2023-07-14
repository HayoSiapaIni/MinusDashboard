<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Produk;
use App\Models\Keranjang;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class KeranjangController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        
        $data = Keranjang::where('id_user', Auth::id()) //Ambil data keranjang yang memiliki id sama dengan id yang sama dengan yang mengakses sistem
        
        ->with(['produk.user' => function ($query) { //relasi dengan produk, dari produk relasi dengan user 
            $query->groupBy('nama_toko')->selectRaw('MAX(users.id) as id, nama_toko'); //group dengan nama toko
        }])
        ->orderBy('created_at', 'desc') //order by created_at
        ->get();

        // $data = Keranjang::where('id_user', Auth::id())
        // ->orderBy('created_at','desc')
        // ->with(['userx' => function ($query) {
        //     $query->orderBy('nama_toko');
        // }])
        // ->get();
        
        // $data = Keranjang::where('id_user', Auth::id())
        // ->with('produk.user')
        // ->groupBy('user.nama_toko')
        // ->orderBy('created_at','desc')
        // ->get();

        // $data = Keranjang::where('id_user', Auth::id())
        // ->orderBy('created_at','desc')
        // ->with('userx')
        // ->groupBy('id_penjual')
        // ->orderBy('id_penjual','desc')
        // ->get();

        // $data = DB::table('keranjangs')
        // ->join('produks', 'keranjangs.id_produk','=','produks.id_produk')
        // ->join('users','produks.id_user','=','users.id')
        // ->groupBy('users.nama_toko')
        // ->select('users.nama_toko')
        // ->where('keranjangs.id_user', '=', Auth::id())
        // ->get();

        //     $data = DB::table('keranjangs')
        //     ->join('produks','produks.id_produk','=','keranjangs.id_produk')
        //     ->join('users','users.id','=','keranjangs.id_user')
        //     ->where('keranjangs.id_user', Auth::id())
        //     ->orderBy('keranjangs.created_at','desc')
        //     ->orderBy('users.nama_toko','desc')
        //     ->get();
        //     // dd($data);
        //     return view('keranjang', compact('data'));
        
        return view('keranjang', compact('data'));
    }

    public function store(Request $request) {
            
        if (Keranjang::where('id_produk', $request->id_produk)->where('id_user', Auth::id())->exists()) {
            $old = Keranjang::where('id_produk', $request->id_produk)->where('id_user', Auth::id())->value('qty_produk');
            Keranjang::where('id_produk',$request->id_produk)->where('id_user', Auth::id())->update(
                ['qty_produk'=> $old + $request->quantity]
            );
        } else {
            Keranjang::create([        
                'id_user' => Auth::id(),
                'id_produk' => $request->id_produk,
                'qty_produk' => $request->quantity,
            ]);
        }
        
        return redirect()->route('produkDetail', $request->id_produk);
    }

    public function destroy($dk) {

        Keranjang::where('id_keranjang', $dk)->delete();
        $data = Keranjang::where('id_user', Auth::id())->with('produk')->with(['userx' => function ($query) {
            $query->orderBy('nama_toko', 'desc');
        }])->get();

        return redirect()->route('keranjangIndex',compact('data'));
    }

    public function update(Request $request) {
        Keranjang::where('id_keranjang',$request->id_keranjang)->update(
            ['qty_produk'=> $request->qty]
        );
        $data = Keranjang::where('id_user', Auth::id())->with('produk')->with(['userx' => function ($query) {
            $query->orderBy('nama_toko', 'desc');
        }])->get();
        return view('keranjang',compact('data'));
    }
    
    public function clickwa(Request $request) {
            
        $id_produk = Keranjang::where('id_keranjang',$request->id_keranjang)->value('id_produk'); //ambil id produk sebagai trigger untuk mengambil id user karena mengakses id user harus menggunakan relasi
        $id_user = Produk::where('id_produk', $id_produk)->value('id_user');  //ambil id user
        
        $nama_toko = User::where('id',$id_user)->value('nama_toko'); //ambil nama toko
        $no_hp = User::where('id',$id_user)->value('no_hp'); // ambil no hp
        $produk_toko = Keranjang::where('id_user',Auth::id())->whereHas('produk', function ($query) use ($id_user) {
            $query->where('id_user', $id_user );
        })->get(); //ambil data produk dalam toko

        $data = '';
        foreach ($produk_toko as $key) {
            $id_produk = $key['id_produk'];
            $nama_produk = Produk::where('id_produk', $id_produk)->value('nama_produk');
            $qty = $key['qty_produk'];
            $data .= ' '.$nama_produk.' '.$qty. ' pcs%0A';
            
        } //eksekusi perulangan untuk mengambil data produk
        
        $url = 'https://wa.me/'.$no_hp.'?text=Halo%20'.$nama_toko.'%20Saya%20menemukan%20produk%20anda%20di%20aplikasi%20Lapak%20Hidroponik,%20Saya%20tertarik%20untuk%20memesan%20:%0A'.$data;
        return redirect($url);        
    }

}
