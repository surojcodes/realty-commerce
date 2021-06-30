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
    public function removeItem($id, Request $req){
        $items = $req->session()->all()['properties'];
        $req->session()->flush();
        $removed ='';
        foreach($items as $item){
            if($item['matrix_id']!==$id){
                $req->session()->push('properties',$item);
            }else{
                $removed = $item['property'];
            }
        }
        return back()->with('success','Property '.$removed.' Removed From Cart');
    }
    public function getCart(Request $req){
        $items = $req->session()->all()['properties'];
        $count = count($items);
        return view('cart',compact('items','count'));
    }
    public function clearCart(Request $req){
        $req->session()->flush();
        return 'Deleted';
    }
}
