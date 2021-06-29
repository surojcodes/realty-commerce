<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $req){
        $data=[
            'matrix_id'=>$req->matrix_id,
            'property'=>$req->property,
            'image'=>$req->image,
            'price'=>$req->price,
        ];
        $req->session()->push('properties',$data);
        return back()->with('success','Added to Cart');
    }
    public function getCart(Request $req){
        dd($req->session()->all());
    }
    public function clearCart(Request $req){
        $req->session()->flush();
        return 'Deleted';
    }
}
