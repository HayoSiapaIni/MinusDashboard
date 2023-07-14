<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\User;
use App\Models\Kategori;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\FuncCall;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard()
    {
        $data = User::where('id',Auth::id())->first();
        $kategori = Kategori::with('userx')->where('id_user',Auth::id())->orderBy('nama_kategori', 'desc')->get();
        return view('seller/Dashboard',compact('data','kategori'));
}


    public function navbar()
    {
        return view('partials/navbar');
    }
    public function kategori()
    {
        return view('seller/Kategori');
    }
    public function produk()
    {
        return view('seller/Produk');
    }

}
