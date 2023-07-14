<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kategori;
use Illuminate\Support\Facades\Auth;

class KategoriController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $data = Kategori::with('userx')->where('id_user',Auth::id())->orderBy('updated_at', 'desc')->get();
        
        return view('seller/Kategori',['data'=> $data]);
    }

    public function tambahKategori(Request $request) {
        
        Kategori::create([        
            'id_user' => Auth::id(),
            'nama_kategori' => $request->input('kategori'),
        ]);

        $data = Kategori::with('userx')->where('id_user',Auth::id())->orderBy('updated_at', 'desc')->get();
          
        return redirect()->route('kategori', compact('data'));
    
    }

    public function update(Request $request) {
        $nama_kategori = $request->input('nama_kategori');
        Kategori::where('id_kategori',$request->id_kategori)->update(['nama_kategori'=> $nama_kategori]);

        $data = Kategori::with('userx')->where('id_user',Auth::id())->orderBy('updated_at', 'desc')->get();
          
        return redirect()->route('kategori', compact('data'));
    }

    public function destroy(Request $request) {
        $data_delete = $request->id_kategori;
        $nama_kategori = Kategori::findOrFail($data_delete);
        $nama_kategori->delete();
        $data = Kategori::with('userx')->where('id_user',Auth::id())->orderBy('updated_at', 'desc')->get();
        
        return redirect()->route('kategori', compact('data'));
    
    }
}
