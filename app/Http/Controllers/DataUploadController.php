<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Imports\PropertiesImport;
use App\Models\Photo;
use DB;
use Excel;

class DataUploadController extends Controller
{
    public function upload(){
        return view('upload');
    }

    public function storeData(Request $req){
         request()->validate([
            'data'=>['required','mimes:xlsx,xls,csv,ods,odt,odp']
            ]);
        Excel::import(new PropertiesImport, request()->file('data'));
        return redirect('/')->with('success', 'Data uploaded Successfully!');
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

}
