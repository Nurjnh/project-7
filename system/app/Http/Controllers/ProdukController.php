<?php

namespace App\Http\Controllers;
use App\Models\Produk;

class ProdukController extends Controller {
    function index(){
        $user = request()->user();
        $data['list_produk'] = Produk::all();
    return view('produk.index', $data);
    }
    function create(){
    return view('produk.create');
    }
    function store(){
       $produk = new produk;
       $produk->id_user = request()->user()->id;
       $produk->nama = request('nama');
       $produk->harga = request('harga');
       $produk->stok = request('stok');
       $produk->deskripsi = request('deskripsi');
       $produk->save();

       return redirect('admin/produk')->with('success', 'Data Berhasil Ditambahkan');
    }
    function show(produk $produk){
        $data['produk'] = $produk;
       return view('produk.show', $data);

    }
    function edit(produk $produk){
       $data['produk'] = $produk;
       return view('produk.edit', $data);
    }
    function update(produk $produk){
       $produk->nama = request('nama');
       $produk->harga = request('harga');
       $produk->stok = request('stok');
       $produk->deskripsi = request('deskripsi');
       $produk->save();

       return redirect('admin/produk')->with('success', 'Data Berhasil Diedit');

    }
    function destroy(produk $produk){
        $produk->delete();

        return redirect('admin/produk')->with('danger', 'Data Berhasil Dihapus');
        
    }
    function Filter()
    {
        $nama = request('nama');
        $stok = explode(",", request('stok'));
        $data['harga_min'] = $harga_min = request('harga_min');
        $data['harga_max'] = $harga_max = request('harga_max');


        //cara memfilter melalui nama
        $data['list_produk'] = Produk::where('nama', 'like', "%$nama%")->get();
        //cara mefilter lebih dari 1 nama
        //$data['list_produk'] = Produk::whereIn('stok', $stok)->get();
        //cara memfilter harga terendah dan tertinggi
        //$data['list_produk'] = Produk::whereBetween('harga', [$harga_min, $harga_max])->get();
        //untuk menghilangkan data lebih dari 1
        //$data['list_produk'] = Produk::whereNotIn('stok',$stok)->get();
        //untung neghilangkan item
        //data['list_produk'] = Produk::where('stok','<>', $nama)->get();
        //untuk menghilangkan harga yang tidak mau di cari
        //$data['list_produk'] = Produk::whereNotBetween('harga', [$harga_min, $harga_max])->get();
        //untuk menampilkan data yang null
        //$data['list_produk'] = Produk::whereNull('stok')->get();
        //untuk menampilkan data yang not null
        //$data['list_produk'] = Produk::whereNotNull('stok')->get();
        //untuk menampilkan produk yang dibuat sesuai tanggal yang ditentukan
        //$data['list_produk'] = Produk::whereDate('created_at', '2021-11--09')->get();
        //untuk menampilkan data yang sesuai tahunnya
        //$data['list_produk'] = Produk::whereYear('created_at', '2021')->get();
        //untuk menampilkan dat sesuai bulan
        //$data['list_produk'] = Produk::whereMouth('created_at', '11')->whereYear('created_at', '2021')->get();
        //untuk menampilkan dat sesuai jam
        //$data['list_produk'] = Produk::whereTime('created_at', '14:02:00')->get();
        // $data['list_produk'] = Produk::whereBetween('harga', [$harga_min, $harga_max])->whereIn('stok', [29])->get();


        $data['nama'] = $nama;
        $data['stok'] = request('stok');
        return view('produk.index', $data);
    }
}