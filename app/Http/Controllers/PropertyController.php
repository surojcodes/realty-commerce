<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\Photo;

class PropertyController extends Controller
{
    public function searchProperty(Request $req){
        $keyword = $req->keyword;
        $totalMatchedListing=0;
        if(is_numeric($keyword)){
            $properties = Property::where('PostalCode',$keyword)->get();
            if(count($properties)<1){
                  return redirect()->route('index')->with('error','Properties for zip "'.$keyword.'" NOT FOUND!');
            }
            $totalMatchedListing=count($properties);
        }else{
           $street = explode(' ',$keyword,3);
           if(is_numeric($street[0])){
            $properties = Property::where('StreetNumber',$street[0])->where('StreetName','LIKE', '%' . $street[1] . '%')->get();
            if(count($properties)<1){
                  return redirect()->route('index')->with('error','Properties for Street "'.$keyword.'" NOT FOUND!');
            }
            $totalMatchedListing=count($properties);
           }else{
                $properties = Property::where('City',$keyword)->get();
                if(count($properties)<1)
                    return redirect()->route('index')->with('error','City "'.$keyword.'" NOT FOUND!');
            $totalMatchedListing=count($properties);
           }
        }
        $listings=[];
        foreach($properties as $property){
            $photo = $property->photos->first();
            $toPush=[
                'info'=>$property,
                'photo'=>$photo->image
            ];
            array_push($listings,$toPush);
        }
        // dd($listings);
        return view('listings',compact('totalMatchedListing','listings','keyword'));
    }
    // public function singleProperty($id){
    //     $resource='Property';
    //     $class = 'Listing';
    //     $results = 
    //     if($results->getReturnedResultsCount()==0){
    //             abort(404);
    //     }
    //     $data = $this->completeFieldRename($results)[0];
    //     $id = $data['Matrix_Unique_ID'];
    //     $images = 
    //     $photos =[];
    //     foreach($images as $image){
    //         array_push($photos,$image->getLocation());
    //     }
    //     return view('singleListing',compact('data','photos'));
    // }
    public function filterByPrice(Request $req,$keyword){
        $keyword = $req->keyword;
        $totalMatchedListing=0;

        $min = (double)$req->min;
        $max = (double)$req->max;
            
        if($max!=0 && $min>$max){
            return view('listings',compact('totalMatchedListing','keyword','max','min'))->with('error','Max value cannot be less than min value.');
        }
    }
}
