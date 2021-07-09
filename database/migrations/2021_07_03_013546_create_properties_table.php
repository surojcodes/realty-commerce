<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('Matrix_Unique_ID',100)->nullable();
            $table->string('MatrixModifiedDT',100)->nullable();
            $table->string('MLS',100)->nullable();
            $table->string('MLSNumber',100)->nullable();
            $table->string('ListAgent_MUI',100)->nullable();
            $table->string('ListAgentFullName',200)->nullable();
            $table->string('ListAgentMLSID',100)->nullable();
            $table->string('ListOffice_MUI',100)->nullable();
            $table->string('ListOfficeMLSID',100)->nullable();
            $table->string('ListOfficeName',100)->nullable();
            $table->string('Latitude',100)->nullable();
            $table->string('Longitude',100)->nullable();
            $table->string('PhotoCount',100)->nullable();
            $table->string('PostalCode',100)->nullable();
            $table->string('LastListPrice',100)->nullable();
            $table->string('PriceChangeTimestamp',100)->nullable();
            $table->string('RoomCount',100)->nullable();
            $table->string('ListPrice',100)->nullable();
            $table->string('StateOrProvince',100)->nullable();
            $table->string("StreetDirPrefix",100)->nullable();
            $table->string("StreetDirSuffix",100)->nullable();
            $table->string("StreetName")->nullable();
            $table->string("StreetNumber",100)->nullable();
            $table->string("StreetSuffix",100)->nullable();
            $table->text("City")->nullable();
            $table->text("BathsFull")->nullable();
            $table->text("BathsHalf")->nullable();
            $table->text("BathsTotal")->nullable();
            $table->text("BedsTotal")->nullable();
            $table->string("SqFtTotal",100)->nullable();
            $table->string("PropertySubType",100)->nullable();
            $table->string("PropertyType",100)->nullable();
            $table->string("LotSize",100)->nullable();
            $table->string("LotSizeArea",100)->nullable();
            $table->string("LotSizeAreaSQFT",100)->nullable();
            $table->string("LotSizeDimensions",100)->nullable();
            $table->string("MLSAreaMajor",100)->nullable();
            $table->string("MLSAreaMinor",100)->nullable();
            $table->text("PoolFeatures")->nullable();
            $table->string("PoolYN",100)->nullable();
            $table->text("PublicRemarks")->nullable();
            $table->string("SchoolDistrict",100)->nullable();
            $table->text("SecurityFeatures")->nullable();
            $table->string("SQFTBuilding",100)->nullable();
            $table->string("SQFTGross",100)->nullable();
            $table->string("SQFTLand",100)->nullable();
            $table->string("SQFTLeasable",100)->nullable();
            $table->string("SQFTLot",100)->nullable();
            $table->text("Utilities")->nullable();
            $table->text("UtilitiesOther")->nullable();
            $table->string("VirtualTourURLUnbranded",100)->nullable();
            $table->string("YearBuilt",100)->nullable();
            $table->text("DateAvailable")->nullable();
            $table->text("ElementarySchoolName")->nullable();
            $table->string("HighSchoolName",100)->nullable();
            $table->string("IntermediateSchoolName",100)->nullable();
            $table->string("JuniorHighSchoolName",100)->nullable();
            $table->string("MiddleSchoolName",100)->nullable();
            $table->string("PrimarySchoolName",100)->nullable();
            $table->string("SeniorHighSchoolName",100)->nullable();
            $table->string("VirtualTourURLBranded",255)->nullable();
            $table->text("Country")->nullable();
            $table->text("status")->nullable();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('properties');
    }
}
