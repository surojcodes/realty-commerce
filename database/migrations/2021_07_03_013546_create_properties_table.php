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
            $table->string("UnitNumber",100)->nullable();
            $table->string("City",100)->nullable();
            $table->string("CountyOrParish",100)->nullable();
            $table->string("BathsFull",100)->nullable();
            $table->string("BathsHalf",100)->nullable();
            $table->string("BathsTotal",100)->nullable();
            $table->string("BedsTotal",100)->nullable();
            $table->string("SqFtTotal",100)->nullable();
            $table->string("PropertySubType",100)->nullable();
            $table->string("PropertyType",100)->nullable();
            $table->string("ParcelNumber",100)->nullable();
            $table->text("AssociationFeeIncludes")->nullable();
            $table->text("InternetExposure")->nullable();
            $table->string("LotSize",100)->nullable();
            $table->string("LotSizeArea",100)->nullable();
            $table->string("LotSizeAreaSQFT",100)->nullable();
            $table->string("LotSizeDimensions",100)->nullable();
            $table->string("LotSizeSource",100)->nullable();
            $table->string("LotSizeUnits",100)->nullable();
            $table->string("LotsSoldPackage",100)->nullable();
            $table->string("LotsSoldSeparate",100)->nullable();
            $table->string("MLSAreaMajor",100)->nullable();
            $table->string("MLSAreaMinor",100)->nullable();
            $table->string("PermitAddressInternetYN",100)->nullable();
            $table->string("PermitAVMYN",100)->nullable();
            $table->string("PermitCommentsReviewsYN",100)->nullable();
            $table->string("PermitInternetYN",100)->nullable();
            $table->string("PlannedDevelopment",100)->nullable();
            $table->text("PoolFeatures")->nullable();
            $table->string("PoolYN",100)->nullable();
            $table->text("PublicRemarks")->nullable();
            $table->string("SchoolDistrict",100)->nullable();
            $table->text("SecurityFeatures")->nullable();
            $table->text("ShowingInstructionsType")->nullable();
            $table->text("SoilType")->nullable();
            $table->text("SpecialNotes")->nullable();
            $table->string("SQFTBuilding",100)->nullable();
            $table->string("SQFTGross",100)->nullable();
            $table->string("SQFTLand",100)->nullable();
            $table->string("SQFTLeasable",100)->nullable();
            $table->string("SQFTLot",100)->nullable();
            $table->string("StreetNumberSearchable",100)->nullable();
            $table->text("StructuralStyle")->nullable();
            $table->string("SubdividedYN",100)->nullable();
            $table->string("SubdivisionName",100)->nullable();
            $table->text("SurfaceRights")->nullable();
            $table->string("TaxLegalDescription",100)->nullable();
            $table->text("Tenancy")->nullable();
            $table->text("TenantPays")->nullable();
            $table->text("Topography")->nullable();
            $table->string("UnexemptTaxes",100)->nullable();
            $table->text("Utilities")->nullable();
            $table->text("UtilitiesOther")->nullable();
            $table->string("VirtualTourURLUnbranded",100)->nullable();
            $table->string("WillSubdivide",100)->nullable();
            $table->string("WillSubdivideYN",100)->nullable();
            $table->string("YearBuilt",100)->nullable();
            $table->text("Zoning")->nullable();
            $table->string("ZoningCommercial",100)->nullable();
            $table->text("RoadFrontage")->nullable();
            $table->string("RoadFrontageDistance",100)->nullable();
            $table->string("MLSNumberSaleOrLease",100)->nullable();
            $table->text("FarmRanchFeatures")->nullable();
            $table->string("YearBuiltDetails",100)->nullable();
            $table->text("TotalAnnualExpensesInclude")->nullable();
            $table->string("AerialPhotoAvailableYN",100)->nullable();
            $table->string("NumberOfBarns",100)->nullable();
            $table->string("DateAvailable",100)->nullable();
            $table->string("ElementarySchoolName",100)->nullable();
            $table->string("HighSchoolName",100)->nullable();
            $table->string("IntermediateSchoolName",100)->nullable();
            $table->string("JuniorHighSchoolName",100)->nullable();
            $table->string("MiddleSchoolName",100)->nullable();
            $table->string("PrimarySchoolName",100)->nullable();
            $table->string("SeniorHighSchoolName",100)->nullable();
            $table->string("VirtualTourURLBranded",100)->nullable();
            $table->string("GarageLength",100)->nullable();
            $table->string("GarageWidth",100)->nullable();
            $table->string("OfficeSupervisor",100)->nullable();
            $table->string("NumberOfTanksAndPonds",100)->nullable();
            $table->text("LaundryLocation")->nullable();
            $table->text("WasherDryerConnections")->nullable();
            $table->string("DockPermittedYN",100)->nullable();
            $table->string("LakePump",100)->nullable();
            $table->string("PlattedWaterfrontBoundary",100)->nullable();
            $table->text("WaterfrontFeatures")->nullable();
            $table->string("WaterfrontYN",100)->nullable();
            $table->text("ConsentforVisitorstoRecord")->nullable();
            $table->text("NoticeSurveillanceDevicesPresent")->nullable();
            $table->string("ParcelNumber2",100)->nullable();
            $table->string("AppFeePayableTo",100)->nullable();
            $table->string("AppFeePlus18YrsYN",100)->nullable();
            $table->string("ApplicationFeeAmount",100)->nullable();
            $table->string("Country",100)->nullable();
            $table->text("PetPolicy")->nullable();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('properties');
    }
}