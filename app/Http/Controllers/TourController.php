<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\NewTourBooking;
use App\Mail\NewContactEmail;


class TourController extends Controller
{
    public function scheduleTour($id,$property){
        return view('tour',compact('property','id'));
    }
    public function confirmTour(Request $req){
        $data = [
            'url' => 'http://localhost:8000/property/'.$req->matrix_id,
            'date' => $req->date,
            'time' => $req->time,
            'style' => $req->style,
            'name' => $req->name,
            'email' => $req->email,
            'phone' => $req->phone,
            'note' => $req->note,
            'property'=>$req->property,
        ];
        Mail::to('tours@hamrorealty.com')->send(new NewTourBooking($data));
        return redirect()->route('index')->with('success','Tour confirmed! We will contact you shortly..');
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
}
