<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\NewTourBooking;
use App\Mail\NewContactEmail;
use App\Mail\BookingConfirmation;

class TourController extends Controller
{
    public function scheduleTour($id,$property,$price){
        $items = [];
        $toPush = [
            'property'=>$property,
            'matrix_id'=>$id,
            'price'=>$price,
        ];
        array_push($items,$toPush);
        return view('tour',compact('items'));
    }
    public function confirmTour(Request $req){
        $data = [
            // 'url' => 'http://localhost:8000/property/'.$req->matrix_id,
            'date' => $req->date,
            'time' => $req->time,
            'style' => $req->style,
            'name' => $req->name,
            'email' => $req->email,
            'phone' => $req->phone,
            'note' => $req->note,
            'properties'=>json_decode($req->items) 
        ];
        $fromCart = $req->fromCart;
        if($fromCart=='schedule-cart'){
             $req->session()->flush();
        }
        Mail::to('tours@hamrorealty.com')->send(new NewTourBooking($data));
        $this->sendConfirmation($req->email,$data);
        return redirect()->route('index')->with('success','Tour confirmed! Please check your email for confirmation email.');
    }
    public function contactEmail(Request $req){
        $data = [
            'name' => $req->name,
            'email' => $req->email,
            'phone' => $req->phone,
            'message' => $req->message,
        ];
        Mail::to('tours@hamrorealty.com')->send(new NewContactEmail($data));
        return redirect()->route('index')->with('success','We heard you! We will contact you shortly');
    }
    private function sendConfirmation($email,$data){
        Mail::to($email)->send(new BookingConfirmation($data));
    }
}
