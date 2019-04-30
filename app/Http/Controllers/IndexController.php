<?php

namespace App\Http\Controllers;

use App\Category_model;
use App\ImageGallery_model;
use App\ProductAtrr_model;
use App\Products_model;
use Illuminate\Http\Request;
use DB;
use App\Review;
use RajaOngkir;
use App\User;

class IndexController extends Controller
{
    public function index(){
        $products=Products_model::all();
        return view('frontEnd.index',compact('products'));
    }
    public function shop(){
        $products=Products_model::all();
        $byCate="";
        return view('frontEnd.products',compact('products','byCate'));
    }
    public function listByCat($id){
        $list_product=Products_model::where('categories_id',$id)->get();
        $byCate=Category_model::select('name')->where('id',$id)->first();
        return view('frontEnd.products',compact('list_product','byCate'));
    }
    public function detialpro($id, Request $request ){
        $detail_product=Products_model::findOrFail($id);
        $review = Review::where('products_id', $id)->get();
        $imagesGalleries=ImageGallery_model::where('products_id',$id)->get();
        $totalStock=ProductAtrr_model::where('products_id',$id)->sum('stock');
        $totalReview = Review::where('products_id', $id)->count('products_id');
        $data=Review::where('products_id', $id)->count('rating');
        $totalRating = Review::where('products_id', $id)->sum('rating');
        $total =  ($totalRating / ($data > 0 ? $data : 1));
        // dd($city);
        $relateProducts=Products_model::where([['id','!=',$id],['categories_id',$detail_product->categories_id]])->get();
        return view('frontEnd.product_details',compact('detail_product','imagesGalleries','totalStock','relateProducts', 'review', 'total', 'totalReview'));
    }
    public function getAttrs(Request $request){
        $all_attrs=$request->all();
        //print_r($all_attrs);die();
        $attr=explode('-',$all_attrs['size']);
        //echo $attr[0].' <=> '. $attr[1];
        $result_select=ProductAtrr_model::where(['products_id'=>$attr[0],'size'=>$attr[1]])->first();
        echo $result_select->price."#".$result_select->stock;
    }
    // public function costShipping(Request $request){
        
    //     $destination = $request->cek_ongkir;
        
    //     $courier = $request->kurir;
    //     $data = RajaOngkir::Cost([
    //         'origin' 		=> 154, // id kota asal
    //         'destination' 	=> $destination, // id kota tujuan
    //         'weight' 		=> 1700, // berat satuan gram
    //         'courier' 		=> $courier, // kode kurir pengantar ( jne / tiki / pos )
    //     ])->get();
    //     return view('frontEnd.jne.cekongkir', compact('data'));
    // }


}
