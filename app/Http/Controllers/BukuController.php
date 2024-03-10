<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\buku;
use App\Models\koleksipribadi;
use Illuminate\Support\Facades\Auth;
use App\Models\peminjaman;
use Illuminate\Support\Facades\Redis;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $buku = Buku::all();
       return view('admin.databuku.index', compact('buku'));
    }

    public function petugas()
    {
        return view('petugas.databuku');
    }

  
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.databuku.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'stock' => 'required',
            'cover' => 'required',
            'tahun_terbit' => 'required',
        ]);

        $gambar = $request->file('cover');
        $new_gambar = time() . '_' . $gambar->getClientOriginalName();
        $gambar->move('uploads/cover/', $new_gambar);

        $buku = new Buku;
        $buku->judul = $request->judul;
        $buku->penulis = $request->penulis;
        $buku->stock = $request->stock;
        $buku->cover = 'uploads/cover/' . $new_gambar;
        $buku->tahun_terbit = $request->tahun_terbit;
        $buku->save();

        return redirect()->route('databuku.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('admin.databuku.edit')->with(['buku' => Buku::find($id),]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'stock' => 'required',
            'cover' => 'required',
            'tahun_terbit' => 'required',
        ]);

        $gambar = $request->file('cover');
        $new_gambar = time() . '_' . $gambar->getClientOriginalName();
        $gambar->move('uploads/cover/', $new_gambar);

        $buku = Buku::find($id);
        $buku->judul = $request->judul;
        $buku->penulis = $request->penulis;
        $buku->stock = $request->stock;
        $buku->cover = 'uploads/cover/' . $new_gambar;
        $buku->tahun_terbit = $request->tahun_terbit;
        $buku->save();

        return redirect()->route('databuku.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $buku = Buku::find($id);
        $buku->delete();

        return redirect()->back();
    }


    //user function

    public function home()
    {
        $listbuku = Buku::all();
        return view('user.home', compact('listbuku'));
    }

    public function pinjambuku($judul)
    {
        if ($judul) {
            $buku = Buku::where('judul', $judul)->first();
    
            return view('user.pinjambuku', compact('judul', 'buku'));
        }
    }
    
    public function pinjam(Request $request)
    {
        $request->validate([
            'tgl_pinjam'=>'required',
            'tgl_kembali'=>'required',
            'total_pinjam' => 'required'
            ]);
        
            $buku = Buku::find($request->id_buku);
 
            $pinjaman = new Peminjaman;
            $pinjaman->id_buku = $request->id_buku;
            $pinjaman->tgl_pinjam = $request->tgl_pinjam;
            $pinjaman->tgl_kembali = $request->tgl_kembali;
            $pinjaman->total_pinjam = $request->total_pinjam ;
            $pinjaman->id_users = Auth::user()->id;
            $pinjaman->save();

            $buku->stock -= $request->total_pinjam;
            $buku->save();

            return redirect()->route('user.home');
    }

    public function listpinjaman(Request $request)
    {
        
        $userId = Auth::id();

        // Dapatkan data pinjaman berdasarkan ID user yang sedang login
        $pinjamanUser = Peminjaman::where('id_users', $userId)->get();
    
     
        return view('user.listpinjaman', compact('pinjamanUser'));
    }

    public function koleksipribadi()
    {
        $userId = Auth::id();

        // Dapatkan data pinjaman berdasarkan ID user yang sedang login
        $koleksiuser = Koleksipribadi::where('id_users', $userId)->get();
    
        return view('user.koleksipribadi',compact('koleksiuser'));
    }


    public function tambah_koleksi(Request $request)
    {
       
            $koleksi = new Koleksipribadi;
            $koleksi->id_buku = $request->id_buku;
            $koleksi->id_users = Auth::user()->id;
            $koleksi->save();

            return redirect()->route('user.home');
    }


}
