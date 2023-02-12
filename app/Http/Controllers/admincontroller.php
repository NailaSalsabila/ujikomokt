<?php

namespace App\Http\Controllers;

use App\Models\detailtransaksi;
use App\Models\kategori;
use App\Models\produk;
use App\Models\User;
use Illuminate\Http\Request;

class admincontroller extends Controller
{
    public function user()
    {
        $user=User::where('role','customer')->get();
        return view('admin.index',compact('user'));
    }
    public function tambahuser()
    {
        return view('admin.tambah');
    }
    public function posttambahuser(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'password'=>'required',
        ]);
        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
            'role'=>'customer'
        ]);
        return redirect()->route('admin.user')->with('status','Berhasil Tambah !');
    }
    public function edituser(user $user)
    {
        return view('admin.edit',compact('user'));
    }
    public function postedituser(Request $request,User $user)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'password'=>'required',
        ]);
        $user->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
            'role'=>'customer'
        ]);
        return redirect()->route('admin.user')->with('status','Berhasil Edit !');
    }
    public function deleteuser(user $user)
    {
        $user->delete();
        return back()->with('status','Berhasil Hapus !');
    }
    /////////////////////////////////////////////////////////kelola produk
    public function produk()
    {
        $produk=produk::paginate(20);
        return view('produk.index',compact('produk'));
    }
    public function tambahproduk()
    {
        $kategori=kategori::all();
        return view('produk.tambah',compact('kategori'));
    }
    public function posttambahproduk(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'harga'=>'required',
            'foto'=>'required',
            'kategori_id'=>'required',
            'keterangan'=>'required',
        ]);
        produk::create([
            'kategori_id'=>$request->kategori_id,
            'name'=>$request->name,
            'harga'=>$request->harga,
            'keterangan'=>$request->keterangan,
            'foto'=>$request->foto->store('img'),
        ]);
        return redirect()->route('admin.produk')->with('status','Berhasil Tambah !');
    }
    public function editproduk(produk $produk)
    {
        $kategori=kategori::all();
        return view('produk.edit',compact('produk','kategori'));
    }
    public function posteditproduk(Request $request,produk $produk)
    {
        $data=$request->validate([
            'name'=>'required',
            'harga'=>'required',
            'foto'=>'required',
            'kategori_id'=>'required',
            'keterangan'=>'required',
        ]);
        if ($request->hasFile('foto')) {
            $data['foto']=$request->foto->store('img');
        } else {
            unset($data['foto']);
        }
        $produk->update($data);
        return redirect()->route('admin.produk')->with('status','Berhasil Edit !');
    }
    public function deleteproduk(produk $produk)
    {
        $produk->delete();
        return back()->with('status','Berhasil Hapus !');
    }
    /////////////////////////////////////////////////////////////kelola kategori
    public function kategori()
    {
        $kategori=kategori::all();
        return view('kategori.index',compact('kategori'));
    }
    public function tambahkategori()
    {
        return view('kategori.tambah');
    }
    public function posttambahkategori(Request $request)
    {
        $request->validate([
            'name'=>'required',
        ]);
        kategori::create([
            'name'=>$request->name,
        ]);
        return redirect()->route('admin.kategori')->with('status','Berhasil Tambah !');
    }
    public function editkategori(kategori $kategori)
    {
        return view('kategori.edit',compact('kategori'));
    }
    public function posteditkategori(Request $request,kategori $kategori)
    {
        $request->validate([
            'name'=>'required',
        ]);
        $kategori->update([
            'name'=>$request->name,
        ]);
        return redirect()->route('admin.kategori')->with('status','Berhasil Edit !');
    }
    public function deletekategori(kategori $kategori)
    {
        $kategori->delete();
        return back()->with('status','Berhasil Hapus !');
    }
    ////////////////////////////////////////////////////kelola transaksi
    public function transaksi()
    {
        $tran=detailtransaksi::where('status','cekout')->get();
        return view('transaksi.index',compact('tran'));
    }
    public function verifikasi(detailtransaksi $detailtransaksi)
    {
        $detailtransaksi->update([
            'status'=>'dikirim'
        ]);
        return back()->with('status','Berhasil Verifikasi !');
    }
}
