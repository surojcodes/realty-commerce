<?php

namespace App\Imports;

use App\Models\Property;
use App\Models\Photo;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PropertiesImport implements ToModel, withHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if($row['photo_count'] > 0){
            $locations = explode(',',$row['highres_location']);
            foreach($locations as $location){
                Photo::create([
                    'matrix_unique_id'=>$row['matrix_unique_id'],
                    'image'=>$location
                ]);
            }
        }
        return new Property([
            'Matrix_Unique_ID'=>$row['matrix_unique_id'],
            'MatrixModifiedDT'=>$row['matrix_modified_dt'],
            'MLS'=>$row['mls'],
            'MLSNumber'=>$row['mls_number'],
            'ListAgent_MUI'=>$row['list_agent_mui'],
            'ListAgentFullName'=>$row['list_agent_full_name'],
            'ListAgentMLSID'=>$row['list_agent_mlsid'],
            'ListOffice_MUI'=>$row['list_office_mui'],
            'ListOfficeMLSID'=>$row['list_office_mlsid'],
            'ListOfficeName'=>$row['list_office_name'],
            'Latitude'=>$row['latitude'],
            'Longitude'=>$row['longitude'],
            'PhotoCount'=>$row['photo_count'],
            'PostalCode'=>$row['postal_code'],
            'LastListPrice'=>$row['last_list_price'],
            'PriceChangeTimestamp'=>$row['price_change_timestamp'],
            'RoomCount'=>$row['room_count'],
            'ListPrice'=>$row['list_price'],
            'StateOrProvince'=>$row['state_or_province'],
            "StreetDirPrefix"=>$row['street_dir_prefix'],
            "StreetDirSuffix"=>$row['street_dir_suffix'],
            "StreetName"=>$row['street_name'],
            "StreetNumber"=>$row['street_number'],
            "StreetSuffix"=>$row['street_suffix'],
            "City"=>$row['city'],
            "BathsFull"=>$row['baths_full'],
            "BathsHalf"=>$row['baths_half'],
            "BathsTotal"=>$row['baths_total'],
            "BedsTotal"=>$row['beds_total'],
            "SqFtTotal"=>$row['sq_ft_total'],
            "PropertySubType"=>$row['property_sub_type'],
            "PropertyType"=>$row['property_type'],
            "LotSize"=>$row['lot_size'],
            "LotSizeArea"=>$row['lot_size_area'],
            "LotSizeAreaSQFT"=>$row['lot_size_area_sqft'],
            "LotSizeDimensions"=>$row['lot_size_dimensions'],
            "MLSAreaMajor"=>$row['mls_area_major'],
            "MLSAreaMinor"=>$row['mls_area_minor'],
            "PoolFeatures"=>$row['pool_yn'],
            "PoolYN"=>$row['pool_features'],
            "PublicRemarks"=>$row['public_remarks'],
            "SchoolDistrict"=>$row['school_district'],
            "SecurityFeatures"=>$row['security_features'],
            "SQFTBuilding"=>$row['sqft_building'],
            "SQFTGross"=>$row['sqft_gross'],
            "SQFTLand"=>$row['sqft_land'],
            "SQFTLeasable"=>$row['sqft_leasable'],
            "SQFTLot"=>$row['sqft_lot'],
            "Utilities"=>$row['utilities'],
            "UtilitiesOther"=>$row['utilities_other'],
            "VirtualTourURLUnbranded"=>$row['virtual_tour_url_unbranded'],
            "YearBuilt"=>$row['year_built'],
            "DateAvailable"=>$row['date_available'],
            "ElementarySchoolName"=>$row['elementary_school_name'],
            "HighSchoolName"=>$row['high_school_name'],
            "IntermediateSchoolName"=>$row['intermediate_school_name'],
            "JuniorHighSchoolName"=>$row['junior_high_school_name'],
            "MiddleSchoolName"=>$row['middle_school_name'],
            "PrimarySchoolName"=>$row['primary_school_name'],
            "SeniorHighSchoolName"=>$row['senior_high_school_name'],
            "VirtualTourURLBranded"=>$row['virtual_tour_url_branded'],
            "Country"=>$row['country'],
            "status"=>$row['status'],
        ]);
    }
}
