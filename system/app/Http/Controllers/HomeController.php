<?php

namespace App\Http\Controllers;

class HomeController extends Controller{


    function showBeranda(){
        return view('admin.section.Beranda');
    }

    function showProduk(){
        return view('admin.section.Produk');
    }

    function showKategori(){
        return view('admin.section.Kategori');
    }

    function showPromo(){
        return view('admin.section.Promo');
    }

    function showlogin_admin(){
        return view('admin.section.login_admin');
    }

    function showUser(){
        return view('admin.section.User');
    }

    function test($produk, $hargaMin = 0, $hargaMax = 0){
        if($produk == 'payung'){
            echo "Tampilkan Produk Payung";
        }elseif($produk =='sepeda'){
            echo "Produk Sepeda";
        }
        echo "<br>"; 
        echo "Harga Min adalah $hargaMin <br>";
        echo "Harga Max adalah $hargaMax <br>";
    }
}

