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
        $type = $this->searchType($keyword);
        
        $properties = $this->search($keyword,$type);
        if(count($properties)<1){
                return redirect()->route('index')->with('error','Properties for "'.$keyword.'" NOT FOUND!');
        }
        $totalMatchedListing=count($properties);
       
        return view('listings',compact('totalMatchedListing','properties','keyword'));
    }
    public function singleProperty($id){
        $resource='Property';
        $class = 'Listing';
        $data = Property::where('Matrix_Unique_ID',$id)->first();
        if(!$data){
            abort(404);
        }
        $images = $data->photos;
        $photos =[];
        foreach($images as $image){
            array_push($photos,$image->image);
        }
        return view('singleListing',compact('data','photos'));
    }
    public function filterByPrice(Request $req, $keyword){
        $keyword = $req->keyword;
        $totalMatchedListing=0;

        $min = (double)$req->min;
        $max = (double)$req->max; 
        $type = $this->searchType($keyword);
        if($max!=0 && $min>$max){
            $properties = $this->search($keyword,$type);
            $totalMatchedListing=count($properties);
            return view('listings',compact('totalMatchedListing','properties','keyword','max','min'))->with('error','Max value cannot be less than min value.');
        }
        $properties = $this->search($keyword,$type,$min,$max);
        $totalMatchedListing=count($properties);
        return view('listings',compact('totalMatchedListing','properties','keyword','max','min'));
    }
    private function search($keyword,$type,$min=null,$max=null){
        if($type=='zip'){
            if($min||$max){
                if($min!==0 && $max!==0){
                    $properties = Property::where('PostalCode',$keyword)->where('ListPrice','>=',$min)->where('ListPrice','<=',$max)->get();
                }if($min==0 && $max!=0){
                    $properties = Property::where('PostalCode',$keyword)->where('ListPrice','<=',$max)->get();
                }if ($max==0 && $min!=0){
                    $properties = Property::where('PostalCode',$keyword)->where('ListPrice','>=',$min)->get();
                }
            }else
                $properties = Property::where('PostalCode',$keyword)->get();
        }else if($type=='street'){
           $street = explode(' ',$keyword,3);
           if(is_numeric($street[0])){

            if($min||$max){
                if($min!==0 && $max!==0){
                   $properties = Property::where('StreetNumber',$street[0])->where('StreetName','LIKE', '%' . $street[1] . '%')->where('ListPrice','>=',$min)->where('ListPrice','<=',$max)->get();
                }if($min==0 && $max!=0){
                    $properties = Property::where('StreetNumber',$street[0])->where('StreetName','LIKE', '%' . $street[1] . '%')->where('ListPrice','<=',$max)->get();
                }if ($max==0&& $min!=0){
                    $properties = Property::where('StreetNumber',$street[0])->where('StreetName','LIKE', '%' . $street[1] . '%')->where('ListPrice','>=',$min)->get();
                }
            }else
                $properties = Property::where('StreetNumber',$keyword)->get();
            
           } 
        }else if($type=='city'){
            if($min||$max){
                if($min!==0 && $max!==0){
                   $properties = Property::where('City',$keyword)->where('ListPrice','>=',$min)->where('ListPrice','<=',$max)->get();
                }if($min==0 && $max!=0){
                    $properties = Property::where('City',$keyword)->where('ListPrice','<=',$max)->get();
                }if ($max==0&& $min!=0){
                    $properties = Property::where('City',$keyword)->where('ListPrice','>=',$min)->get();
                }
            }else
               $properties = Property::where('City',$keyword)->get();

        }
        return $properties;
    }
    private function searchType($keyword){
        if(is_numeric($keyword)){
           return 'zip';
        }else{
           $street = explode(' ',$keyword,3);
            if(is_numeric($street[0])){
                return 'street';
            }else{
                return 'city';
            }
        }
    }
}
