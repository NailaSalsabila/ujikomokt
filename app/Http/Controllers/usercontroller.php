<?php

namespace App\Http\Controllers;

use App\Models\detailtransaksi;
use App\Models\produk;
use App\Models\transaksi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class usercontroller extends Controller
{
    public function home()
    {
        $data=produk::all();
        return view('welcome',compact('data'));
    }
    public function detail(produk $produk)
    {
        return view('detail',compact('produk'));
    }
    public function login()
    {
        return view('login');
    }
    public function postlogin(Request $request)
    {
        $data=$request->validate([
            'email'=>'required',
            'password'=>'required',
        ]);
        if (Auth::attempt($data)) {
            $user=Auth::user();
            if ($user->role == 'admin') {
                return redirect()->route('admin.user')->with('status','Selamat Datang ' .$user->name);
            } else {
                return redirect()->route('home')->with('status','Selamat Datang ' .$user->name);
            }
            
        }
        return back()->with('status','Gagal Login !');
    }
    public function register()
    {
        return view('register');
    }
    public function postregister(Request $request)
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
        return redirect()->route('login')->with('status','Silahkan Login!');
    }
    public function logout()
    {
        auth()->logout();
        return redirect()->route('home')->with('status','Berhasil Keluar !');
    }
    public function keranjang()
    {
        $data=detailtransaksi::where('user_id',auth()->id())->where('status','keranjang')->with('produk')->get();
        return view('keranjang',compact('data'));
    }
    public function postkeranjang(Request $request, produk $produk)
    {
        $request->validate([
            'qty'=>'required'
        ]);
        detailtransaksi::create([
            'user_id'=>Auth::id(),
            'produk_id'=>$produk->id,
            'status'=>'keranjang',
            'qty'=>$request->qty,
            'totalharga'=>$produk->harga*$request->qty,
        ]);
        return redirect()->route('keranjang')->with('status','Berhasil Masuk Keranjang !');
    }
    public function delete(detailtransaksi $detailtransaksi)
    {
        $detailtransaksi->delete();
        return back()->with('status','Berhasil Hapus !');
    }
    public function bayar(detailtransaksi $detailtransaksi)
    {
        $produk=$detailtransaksi->produk;
        return view('bayar',compact('produk','detailtransaksi'));
    }
    public function prosesbayar(Request $request, detailtransaksi $detailtransaksi)
    {
        $request->validate([
            'bukti'=>'required'
        ]);
        $transaksi=transaksi::create([
            'user_id'=>auth()->id(),
            'totalharga'=>$detailtransaksi->totalharga,
            'kode'=>'INV' .Str::random(8),
            'bukti'=>$request->bukti->store('images')
        ]);
        $detailtransaksi->update([
            'transaksi_id'=>$transaksi->id,
            'status'=>'cekout',
            'bukti'=>$request->bukti->store('images')
        ]);
        return redirect()->route('summary')->with('status','Berhasil Melakukan Pembayaran !');
    }
    public function summary()
    {
        $data=detailtransaksi::where('user_id',auth()->id())->where('status','!=','keranjang')->with('produk')->get();
        return view('summary',compact('data'));
    }
}
