<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\Photo;
use DB;

class DataDownloadController extends Controller
{
    public function __construct(){
        $config = new \PHRETS\Configuration;

        $config->setLoginUrl(env('RETS_LOGIN_URL'))
            ->setUsername(env('RETS_USERNAME'))
            ->setPassword(env('RETS_PASSWORD'))
            ->setRetsVersion('1.8');

        $this->rets = new \PHRETS\Session($config);
        $connect = $this->rets->Login();
    }
    public function download(){

        DB::table('properties')->truncate();
        DB::table('photos')->truncate();
        
        $from = 0;
        $total=0;
        while(true){
            $results = $this->downloadParts($from);
            
            if(count($results)==0){
              break;
            }else{
                $results = $this->fieldRename($results);
    
                foreach($results as $property){
                    $newPrpoerty = Property::create($property);
                    $id = $property['Matrix_Unique_ID'];
                    $images = $this->rets->getObject('Property','HighRes',$id,'*',1);
                    foreach($images as $image){
                        Photo::create([
                            'property_id'=>$newPrpoerty->id,
                            'image'=>$image->getLocation()
                        ]);
                    }
                }
                $total += count($results);
                echo 'Downloaded Data:'.$total.'<br>';
                $from = Property::orderBy('Matrix_Unique_ID','Desc')->first()->Matrix_Unique_ID + 1;
                
            }
        }
         return 'Download Completed :)';
    }
    private function FieldRename($oldArray){
        foreach ($oldArray as $arrayData) {
            $newArray[] = [
                'Matrix_Unique_ID'=> $arrayData['Matrix_Unique_ID'],
                'MatrixModifiedDT'=> $arrayData['MatrixModifiedDT'],
                'MLS'=> $arrayData['MLS'],
                'MLSNumber'=> $arrayData['MLSNumber'],
                'ListAgent_MUI'=> $arrayData['ListAgent_MUI'],
                'ListAgentFullName'=> $arrayData['ListAgentFullName'],
                'ListAgentMLSID'=> $arrayData['ListAgentMLSID'],
                'ListOffice_MUI'=> $arrayData['ListOffice_MUI'],
                'ListOfficeMLSID' => $arrayData['ListOfficeMLSID'],
                'ListOfficeName' => $arrayData['ListOfficeName'],
                'Latitude' => $arrayData['Latitude'],
                'Longitude' => $arrayData['Longitude'],
                'PhotoCount' => $arrayData['PhotoCount'],
                'PostalCode' => $arrayData['PostalCode'],
                'LastListPrice' => $arrayData['LastListPrice'],
                'PriceChangeTimestamp' => $arrayData['PriceChangeTimestamp'],
                'RoomCount' => $arrayData['RoomCount'],
                'ListPrice' => $arrayData['ListPrice'],
                'StateOrProvince' => $arrayData['StateOrProvince'],
                "StreetDirPrefix" =>  $arrayData['StreetDirPrefix'],
                "StreetDirSuffix" => $arrayData['StreetDirSuffix'],
                "StreetName" =>  $arrayData['StreetName'],
                "StreetNumber" => $arrayData['StreetNumber'],
                "StreetSuffix" =>  $arrayData['StreetSuffix'],
                "UnitNumber" => $arrayData['UnitNumber'],
                "City" =>  $arrayData['City'],
                "CountyOrParish" =>  $arrayData['CountyOrParish'],
                "BathsFull" =>  $arrayData['BathsFull'],
                "BathsHalf" =>  $arrayData['BathsHalf'],
                "BathsTotal" =>  $arrayData['BathsTotal'],
                "BedsTotal" =>  $arrayData['BedsTotal'],
                "SqFtTotal" =>  $arrayData['SqFtTotal'],
                "PropertySubType" =>  $arrayData['PropertySubType'],
                "PropertyType" =>  $arrayData['PropertyType'],
                "ParcelNumber" =>  $arrayData['ParcelNumber'],
                "AssociationFeeIncludes" =>  $arrayData['AssociationFeeIncludes'],
                "InternetExposure" => $arrayData['InternetExposure'],
                "LotSize" => $arrayData['LotSize'],
                "LotSizeArea" => $arrayData['LotSizeArea'],
                "LotSizeAreaSQFT" =>  $arrayData['LotSizeAreaSQFT'],
                "LotSizeDimensions" =>  $arrayData['LotSizeDimensions'],
                "LotSizeSource" => $arrayData['LotSizeSource'],
                "LotSizeUnits" =>  $arrayData['LotSizeUnits'],
                "LotsSoldPackage" =>  $arrayData['LotsSoldPackage'],
                "LotsSoldSeparate" =>  $arrayData['LotsSoldSeparate'],
                "MLSAreaMajor" =>  $arrayData['MLSAreaMajor'],
                "MLSAreaMinor" =>  $arrayData['MLSAreaMinor'],
                "PermitAddressInternetYN" =>$arrayData['PermitAddressInternetYN'],
                "PermitAVMYN" => $arrayData['PermitAVMYN'],
                "PermitCommentsReviewsYN" => $arrayData['PermitCommentsReviewsYN'],
                "PermitInternetYN" => $arrayData['PermitInternetYN'],
                "PlannedDevelopment" => $arrayData['PlannedDevelopment'],
                "PoolFeatures" =>$arrayData['PoolFeatures'],
                "PoolYN" =>$arrayData['PoolYN'],
                "PublicRemarks" =>$arrayData['PublicRemarks'],
                "SchoolDistrict" => $arrayData['SchoolDistrict'],
                "SecurityFeatures" => $arrayData['SecurityFeatures'],
                "ShowingInstructionsType" => $arrayData['ShowingInstructionsType'],
                "SoilType" => $arrayData['SoilType'],
                "SpecialNotes" => $arrayData['SpecialNotes'],
                "SQFTBuilding" => $arrayData['SQFTBuilding'],
                "SQFTGross" => $arrayData['SQFTGross'],
                "SQFTLand" => $arrayData['SQFTLand'],
                "SQFTLeasable" => $arrayData['SQFTLeasable'],
                "SQFTLot" => $arrayData['SQFTLot'],
                "StreetNumberSearchable" => $arrayData['StreetNumberSearchable'],
                "StructuralStyle" => $arrayData['StructuralStyle'],
                "SubdividedYN" => $arrayData['SubdividedYN'],
                "SubdivisionName" => $arrayData['SubdivisionName'],
                "SurfaceRights" => $arrayData['SurfaceRights'],
                "TaxLegalDescription" =>$arrayData['TaxLegalDescription'],
                "Tenancy" => $arrayData['Tenancy'],
                "TenantPays" => $arrayData['TenantPays'],
                "Topography" => $arrayData['Topography'],
                "UnexemptTaxes" => $arrayData['UnexemptTaxes'],
                "Utilities" => $arrayData['Utilities'],
                "UtilitiesOther" => $arrayData['UtilitiesOther'],
                "VirtualTourURLUnbranded" => $arrayData['VirtualTourURLUnbranded'],
                "WillSubdivide" => $arrayData['WillSubdivide'],
                "WillSubdivideYN" => $arrayData['WillSubdivideYN'],
                "YearBuilt" => $arrayData['YearBuilt'],
                "Zoning" =>$arrayData['Zoning'],
                "ZoningCommercial" => $arrayData['ZoningCommercial'],
                "RoadFrontage" => $arrayData['RoadFrontage'],
                "RoadFrontageDistance" => $arrayData['RoadFrontageDistance'],
                "MLSNumberSaleOrLease" => $arrayData['MLSNumberSaleOrLease'],
                "FarmRanchFeatures" => $arrayData['FarmRanchFeatures'],
                "YearBuiltDetails" => $arrayData['YearBuiltDetails'],
                "TotalAnnualExpensesInclude" => $arrayData['TotalAnnualExpensesInclude'],
                "AerialPhotoAvailableYN" => $arrayData['AerialPhotoAvailableYN'],
                "NumberOfBarns" => $arrayData['NumberOfBarns'],
                "DateAvailable" => $arrayData['DateAvailable'],
                "ElementarySchoolName" => $arrayData['ElementarySchoolName'],
                "HighSchoolName" => $arrayData['HighSchoolName'],
                "IntermediateSchoolName" =>$arrayData['IntermediateSchoolName'],
                "JuniorHighSchoolName" =>$arrayData['JuniorHighSchoolName'],
                "MiddleSchoolName" => $arrayData['MiddleSchoolName'],
                "PrimarySchoolName" =>$arrayData['PrimarySchoolName'],
                "SeniorHighSchoolName" => $arrayData['SeniorHighSchoolName'],
                "VirtualTourURLBranded" => $arrayData['VirtualTourURLBranded'],
                "GarageLength" =>$arrayData['GarageLength'],
                "GarageWidth" => $arrayData['GarageWidth'],
                "OfficeSupervisor" => $arrayData['OfficeSupervisor'],
                "NumberOfTanksAndPonds" => $arrayData['NumberOfTanksAndPonds'],
                "LaundryLocation" => $arrayData['LaundryLocation'],
                "WasherDryerConnections" =>$arrayData['WasherDryerConnections'],
                "DockPermittedYN" => $arrayData['DockPermittedYN'],
                "LakePump" => $arrayData['LakePump'],
                "PlattedWaterfrontBoundary" => $arrayData['PlattedWaterfrontBoundary'],
                "WaterfrontFeatures" => $arrayData['WaterfrontFeatures'],
                "WaterfrontYN" => $arrayData['WaterfrontYN'],
                "ConsentforVisitorstoRecord" =>$arrayData['ConsentforVisitorstoRecord'],
                "NoticeSurveillanceDevicesPresent" => $arrayData['NoticeSurveillanceDevicesPresent'],
                "ParcelNumber2" => $arrayData['ParcelNumber2'],
                "AppFeePayableTo" =>$arrayData['AppFeePayableTo'],
                "AppFeePlus18YrsYN" =>$arrayData['AppFeePlus18YrsYN'],
                "ApplicationFeeAmount" => $arrayData['ApplicationFeeAmount'],
                "Country" => $arrayData['Country'],
                "PetPolicy" =>$arrayData['PetPolicy'],
            ];
        }
        return $newArray??[];
    }
    private function downloadParts($from){
          $resource='Property';
          $class = 'Listing';
        
         $results = $this->rets->Search($resource, $class, '(MATRIX_UNIQUE_ID= '.$from.'+),(STATUS=A)',[
            'Limit' => 20000,
        ]);
        return $results;
    }
}
