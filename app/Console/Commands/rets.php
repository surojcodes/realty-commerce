<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class rets extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rets:properties';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Pull residential properties from rets and import into DB';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
       parent::__construct();
             // Instanciste PHRETS configuation
        $config = new \PHRETS\Configuration;

        // Request a login using our RETS creds
        $config->setLoginUrl(env('RETS_LOGIN_URL'))
            ->setUsername(env('RETS_USERNAME'))
            ->setPassword(env('RETS_PASSWORD'))
            ->setRetsVersion('1.8');

        // Start up a PHRETS Session with our login response
        $this->rets = new \PHRETS\Session($config);

        // Connect to the service
        $connect = $this->rets->Login();
       
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $resource='Property';
        $class = 'Listing';
        // $query='BEDSTOTAL'
        $results = $this->rets->Search($resource, $class, '(PHOTOCOUNT=1+)',[
            'Limit' => 2,
        ]);
       
        // Rename returned number keys as names
        $results = $this->fieldRename($results);

        $id = $results[0]['Matrix_Unique_ID'];
        $photos = $this->rets->getObject('Property','Photo',$results[0]['Matrix_Unique_ID'],'*',1);
        // $photos = $this->rets->Search('Media','Media',"(MATRIX_UNIQUE_ID=$id)");
        // dd($photos);
        foreach($photos as $photo){
            $file = 'data.txt';
			$content = $photo->getLocation();
			$photo->getContent(file_put_contents($file, $content));
        }
        dd($photos);
        return 0;   
    }


     public function fieldRename($oldArray)
    {
        // For each item in the array rename the keys
        foreach ($oldArray as $arrayData) {
            $newArray[] = [
                'Matrix_Unique_ID'=> $arrayData['Matrix_Unique_ID'],
                'MatrixModifiedDT'=> $arrayData['MatrixModifiedDT'],
                'MLS'=> $arrayData['MLS'],
                'MLSNumber'=> $arrayData['MLSNumber'],
                'CoListAgentFullName'=> $arrayData['CoListAgentFullName'],
                'CoListAgentMLSID'=> $arrayData['CoListAgentMLSID'],
                'ListAgent_MUI'=> $arrayData['ListAgent_MUI'],
                'ListAgentFullName'=> $arrayData['ListAgentFullName'],
                'ListAgentMLSID'=> $arrayData['ListAgentMLSID'],
                'ListOffice_MUI'=> $arrayData['ListOffice_MUI'],
                'ListOfficeMLSID' => $arrayData['ListOfficeMLSID'],
                'ListOfficeName' => $arrayData['ListOfficeName'],
                'SellingAgentFullName' => $arrayData['SellingAgentFullName'],
                'SellingAgentMLSID' => $arrayData['SellingAgentMLSID'],
                'SellingOfficeMLSID' => $arrayData['SellingOfficeMLSID'],
                'SellingOfficeName' => $arrayData['SellingOfficeName'],
                'Latitude' => $arrayData['Latitude'],
                'Longitude' => $arrayData['Longitude'],
                'OpenHouseCount' => $arrayData['OpenHouseCount'],
                'PhotoCount' => $arrayData['PhotoCount'],
                'PhotoModificationTimestamp' => $arrayData['PhotoModificationTimestamp'],
                'CloseDate' => $arrayData['CloseDate'],
                'PendingDate' => $arrayData['PendingDate'],
                'PostalCode' => $arrayData['PostalCode'],
                'LastListPrice' => $arrayData['LastListPrice'],
                'PriceChangeTimestamp' => $arrayData['PriceChangeTimestamp'],
                'RoomCount' => $arrayData['RoomCount'],
                'AcresBottomLand' => $arrayData['AcresBottomLand'],
                'AcresCultivated' => $arrayData['AcresCultivated'],
                'AcresIrrigated' => $arrayData['AcresIrrigated'],
                'AcresPasture' => $arrayData['AcresPasture'],
                'ActiveContinueToShowDate' => $arrayData['ActiveContinueToShowDate'],
                'ActiveKickOutDate' => $arrayData['ActiveKickOutDate'],
                'ActiveOpenHouseCount' => $arrayData['ActiveOpenHouseCount'],
                'ActiveOptionContractDate' => $arrayData['ActiveOptionContractDate'],
                'AGExemptionYN' => $arrayData['AGExemptionYN'],
                'AppliancesYN' => $arrayData['AppliancesYN'],
                'ApplicationFeeYN' => $arrayData['ApplicationFeeYN'],
                'AppraiserName' => $arrayData['AppraiserName'],
                'ArchitecturalStyle' => $arrayData['ArchitecturalStyle'],
                'AssociationFee' => $arrayData['AssociationFee'],
                'AssociationFeeFrequency' => $arrayData['AssociationFeeFrequency'],
                'AssociationFeeIncludes' => $arrayData['AssociationFeeIncludes'],
                'AssociationType' => $arrayData['AssociationType'],
                'AverageMonthlyLease' => $arrayData['AverageMonthlyLease'],
                'Barn1Length' => $arrayData['Barn1Length'],
                'Barn1Width' => $arrayData['Barn1Width'],
                'Barn2Length' => $arrayData['Barn2Length'],
                'Barn2Width' => $arrayData['Barn2Width'],
                'Barn3Length' => $arrayData['Barn3Length'],
                'Barn3Width' => $arrayData['Barn3Width'],
                'BarnInformation' => $arrayData['BarnInformation'],
                'BedroomBathroomFeatures' => $arrayData['BedroomBathroomFeatures'],
                'Block' => $arrayData['Block'],
                'BuildingAreaSource' => $arrayData['BuildingAreaSource'],
                'BuildingNumber' => $arrayData['BuildingNumber'],
                'BuildingUse' => $arrayData['BuildingUse'],
                'BusinessName' => $arrayData['BusinessName'],
                'CapitalizationRate' => $arrayData['CapitalizationRate'],
                'CeilingHeight' => $arrayData['CeilingHeight'],
                'CommercialFeatures' => $arrayData['CommercialFeatures'],
                'CommunityFeatures' => $arrayData['CommunityFeatures'],
                'CompensationPaid' => $arrayData['CompensationPaid'],
                'ComplexName' => $arrayData['ComplexName'],
                'ConstructionMaterials' => $arrayData['ConstructionMaterials'],
                'ConstructionMaterialsWalls' => $arrayData['ConstructionMaterialsWalls'],
                'CropRetireProgramYN' => $arrayData['CropRetireProgramYN'],
                'Crops' => $arrayData['Crops'],
                'DepositAmount' => $arrayData['DepositAmount'],
                'DepositPet' => $arrayData['DepositPet'],
                'Development' => $arrayData['Development'],
                'Directions' => $arrayData['Directions'],
                'Documents' => $arrayData['Documents'],
                'Easements' => $arrayData['Easements'],
                'EnergySavingFeatures' => $arrayData['EnergySavingFeatures'],
                'ExteriorBuildings' => $arrayData['ExteriorBuildings'],
                'ExteriorFeatures' => $arrayData['ExteriorFeatures'],
                'FencedYardYN' => $arrayData['FencedYardYN'],
                'Fencing' => $arrayData['Fencing'],
                'FHA_VA_ApprovedComplexNumber' => $arrayData['FHA_VA_ApprovedComplexNumber'],
                'FinancingProposed' => $arrayData['FinancingProposed'],
                'FireplaceFeatures' => $arrayData['FireplaceFeatures'],
                'FireplacesTotal' => $arrayData['FireplacesTotal'],
                'Flooring' => $arrayData['Flooring'],
                'FloorLocationNumber' => $arrayData['FloorLocationNumber'],
                'FoundationDetails' => $arrayData['FoundationDetails'],
                'FreightDoors' => $arrayData['FreightDoors'],
                'FrontageFeet' => $arrayData['FrontageFeet'],
                'FurnishedYN' => $arrayData['FurnishedYN'],
                'GreenBuildingCertification' => $arrayData['GreenBuildingCertification'],
                'GreenEnergyEfficient' => $arrayData['GreenEnergyEfficient'],
                'GrossAnnualExpenses' => $arrayData['GrossAnnualExpenses'],
                'GrossAnnualIncome' => $arrayData['GrossAnnualIncome'],
                'GrossIncomeMultiplier' => $arrayData['GrossIncomeMultiplier'],
                'HandicapYN' => $arrayData['HandicapYN'],
                'Heating' => $arrayData['Heating'],
                'Inclusions' => $arrayData['Inclusions'],
                'IncomeExpenseSource' => $arrayData['IncomeExpenseSource'],
                'InsuranceExpense' => $arrayData['InsuranceExpense'],
                'InteriorFeatures' => $arrayData['InteriorFeatures'],
                'InternetExposure' => $arrayData['InternetExposure'],
                'LakeName' => $arrayData['LakeName'],
                'LandLeasedYN' => $arrayData['LandLeasedYN'],
                'LeaseConditions' => $arrayData['LeaseConditions'],
                'LeaseExpirationDate' => $arrayData['LeaseExpirationDate'],
                'LeaseRateMax' => $arrayData['LeaseRateMax'],
                'LeaseRateMin' => $arrayData['LeaseRateMin'],
                'LeaseTerm' => $arrayData['LeaseTerm'],
                'LeaseTerms' => $arrayData['LeaseTerms'],
                'LeaseType' => $arrayData['LeaseType'],
                'LesseePays' => $arrayData['LesseePays'],
                'ListPriceLow' => $arrayData['ListPriceLow'],
                'LotFeatures' => $arrayData['LotFeatures'],
                'LotNumber' => $arrayData['LotNumber'],
                'LotSize' => $arrayData['LotSize'],
                'LotSizeArea' => $arrayData['LotSizeArea'],
                'LotSizeAreaSQFT' => $arrayData['LotSizeAreaSQFT'],
                'LotSizeDimensions' => $arrayData['LotSizeDimensions'],
                'LotSizeSource' => $arrayData['LotSizeSource'],
                'LotSizeUnits' => $arrayData['LotSizeUnits'],
                'LotsSoldPackage' => $arrayData['LotsSoldPackage'],
                'LotsSoldSeparate' => $arrayData['LotsSoldSeparate'],
                'MLSAreaMajor' => $arrayData['MLSAreaMajor'],
                'MLSAreaMinor' => $arrayData['MLSAreaMinor'],
                'MoniesRequired' => $arrayData['MoniesRequired'],
                'MonthlyPetFee' => $arrayData['MonthlyPetFee'],
                'MoveInDate' => $arrayData['MoveInDate'],
                'MultiParcelIDYN' => $arrayData['MultiParcelIDYN'],
                'MultiZoningYN' => $arrayData['MultiZoningYN'],
                'MunicipalUtilityDistrictYN' => $arrayData['MunicipalUtilityDistrictYN'],
                'NetAnnualIncome' => $arrayData['NetAnnualIncome'],
                'NonRefundablePetFeeYN' => $arrayData['NonRefundablePetFeeYN'],
                'NumberOfBuildings' => $arrayData['NumberOfBuildings'],
                'NumberOfDaysGuestsAllowed' => $arrayData['NumberOfDaysGuestsAllowed'],
                'NumberOfDiningAreas' => $arrayData['NumberOfDiningAreas'],
                'NumberOfLakes' => $arrayData['NumberOfLakes'],
                'NumberOfLeaseableSpaces' => $arrayData['NumberOfLeaseableSpaces'],
                'NumberOfLivingAreas' => $arrayData['NumberOfLivingAreas'],
                'NumberOfLots' => $arrayData['NumberOfLots'],
                'NumberOfParkingSpaces' => $arrayData['NumberOfParkingSpaces'],
                'NumberOfPetsAllowed' => $arrayData['NumberOfPetsAllowed'],
                'NumberOfResidences' => $arrayData['NumberOfResidences'],
                'NumberOfSpacesLeased' => $arrayData['NumberOfSpacesLeased'],
                'NumberOfStories' => $arrayData['NumberOfStories'],
                'NumberOfStoriesInBuilding' => $arrayData['NumberOfStoriesInBuilding'],
                'NumberOfUnits' => $arrayData['NumberOfUnits'],
                'NumberOfVehicles' => $arrayData['NumberOfVehicles'],
                'NumberOfWaterMeters' => $arrayData['NumberOfWaterMeters'],
                'NumberOfWells' => $arrayData['NumberOfWells'],
                'OccupancyRate' => $arrayData['OccupancyRate'],
                'OpenHouseUpcoming' => $arrayData['OpenHouseUpcoming'],
                'OtherEquipment' => $arrayData['OtherEquipment'],
                'OwnerPays' => $arrayData['OwnerPays'],
                'OwnerPermissionToVideoYN' => $arrayData['OwnerPermissionToVideoYN'],
                'ParkingFeatures' => $arrayData['ParkingFeatures'],
                'ParkingSpacesCarport' => $arrayData['ParkingSpacesCarport'],
                'ParkingSpacesCoveredTotal' => $arrayData['ParkingSpacesCoveredTotal'],
                'ParkingSpacesGarage' => $arrayData['ParkingSpacesGarage'],
                'PermitAddressInternetYN' => $arrayData['PermitAddressInternetYN'],
                'PermitAVMYN' => $arrayData['PermitAVMYN'],
                'PermitCommentsReviewsYN' => $arrayData['PermitCommentsReviewsYN'],
                'PermitInternetYN' => $arrayData['PermitInternetYN'],
                'PlannedDevelopment' => $arrayData['PlannedDevelopment'],
                'PoolFeatures' => $arrayData['PoolFeatures'],
                'PoolYN' => $arrayData['PoolYN'],
                'Possession' => $arrayData['Possession'],
                'PresentUse' => $arrayData['PresentUse'],
                'PropertyAssociationFees' => $arrayData['PropertyAssociationFees'],
                'ProposedUse' => $arrayData['ProposedUse'],
                'PublicRemarks' => $arrayData['PublicRemarks'],
                'RanchName' => $arrayData['RanchName'],
                'RanchType' => $arrayData['RanchType'],
                'Restrictions' => $arrayData['Restrictions'],
                'RoadAssessmentYN' => $arrayData['RoadAssessmentYN'],
                'Roof' => $arrayData['Roof'],
                'SchoolDistrict' => $arrayData['SchoolDistrict'],
                'SecurityFeatures' => $arrayData['SecurityFeatures'],
                'ShowingInstructionsType' => $arrayData['ShowingInstructionsType'],
                'SoilType' => $arrayData['SoilType'],
                'SpecialNotes' => $arrayData['SpecialNotes'],
                'SQFTBuilding' => $arrayData['SQFTBuilding'],
                'SQFTGross' => $arrayData['SQFTGross'],
                'SQFTLand' => $arrayData['SQFTLand'],
                'SQFTLeasable' => $arrayData['SQFTLeasable'],
                'SQFTLot' => $arrayData['SQFTLot'],
                'StreetNumberSearchable' => $arrayData['StreetNumberSearchable'],
                'StructuralStyle' => $arrayData['StructuralStyle'],
                'SubdividedYN' => $arrayData['SubdividedYN'],
                'SubdivisionName' => $arrayData['SubdivisionName'],
                'SurfaceRights' => $arrayData['SurfaceRights'],
                'TaxLegalDescription' => $arrayData['TaxLegalDescription'],
                'Tenancy' => $arrayData['Tenancy'],
                'TenantPays' => $arrayData['TenantPays'],
                'Topography' => $arrayData['Topography'],
                'UnexemptTaxes' => $arrayData['UnexemptTaxes'],
                'Utilities' => $arrayData['Utilities'],
                'UtilitiesOther' => $arrayData['UtilitiesOther'],
                'VirtualTourURLUnbranded' => $arrayData['VirtualTourURLUnbranded'],
                'WillSubdivide' => $arrayData['WillSubdivide'],
                'WillSubdivideYN' => $arrayData['WillSubdivideYN'],
                'YearBuilt' => $arrayData['YearBuilt'],
                'Zoning' => $arrayData['Zoning'],
                'ZoningCommercial' => $arrayData['ZoningCommercial'],
                'RoadFrontage' => $arrayData['RoadFrontage'],
                'RoadFrontageDistance' => $arrayData['RoadFrontageDistance'],
                'MLSNumberSaleOrLease' => $arrayData['MLSNumberSaleOrLease'],
                'FarmRanchFeatures' => $arrayData['FarmRanchFeatures'],
                'YearBuiltDetails' => $arrayData['YearBuiltDetails'],
                'TotalAnnualExpensesInclude' => $arrayData['TotalAnnualExpensesInclude'],
                'AerialPhotoAvailableYN' => $arrayData['AerialPhotoAvailableYN'],
                'NumberOfStallsInBarn1' => $arrayData['NumberOfStallsInBarn1'],
                'NumberOfStallsInBarn2' => $arrayData['NumberOfStallsInBarn2'],
                'NumberOfStallsInBarn3' => $arrayData['NumberOfStallsInBarn3'],
                'NumberOfBarns' => $arrayData['NumberOfBarns'],
                'DateAvailable' => $arrayData['DateAvailable'],
                'ElementarySchoolName' => $arrayData['ElementarySchoolName'],
                'HighSchoolName' => $arrayData['HighSchoolName'],
                'IntermediateSchoolName' => $arrayData['IntermediateSchoolName'],
                'JuniorHighSchoolName' => $arrayData['JuniorHighSchoolName'],
                'MiddleSchoolName' => $arrayData['MiddleSchoolName'],
                'PrimarySchoolName' => $arrayData['PrimarySchoolName'],
                'SeniorHighSchoolName' => $arrayData['SeniorHighSchoolName'],
                'VirtualTourURLBranded' => $arrayData['VirtualTourURLBranded'],
                'GarageLength' => $arrayData['GarageLength'],
                'GarageWidth' => $arrayData['GarageWidth'],
                'OfficeSupervisor' => $arrayData['OfficeSupervisor'],
                'HOAManagementCompany' => $arrayData['HOAManagementCompany'],
                'HOAManagementCompanyPhone' => $arrayData['HOAManagementCompanyPhone'],
                'NumberOfTanksAndPonds' => $arrayData['NumberOfTanksAndPonds'],
                'LaundryLocation' => $arrayData['LaundryLocation'],
                'WasherDryerConnections' => $arrayData['WasherDryerConnections'],
                'DockPermittedYN' => $arrayData['DockPermittedYN'],
                'LakePump' => $arrayData['LakePump'],
                'PlattedWaterfrontBoundary' => $arrayData['PlattedWaterfrontBoundary'],
                'WaterfrontFeatures' => $arrayData['WaterfrontFeatures'],
                'WaterfrontYN' => $arrayData['WaterfrontYN'],
                'ConsentforVisitorstoRecord' => $arrayData['ConsentforVisitorstoRecord'],
                'NoticeSurveillanceDevicesPresent' => $arrayData['NoticeSurveillanceDevicesPresent'],
                'ParcelNumber2' => $arrayData['ParcelNumber2'],
                'AppFeePayableTo' => $arrayData['AppFeePayableTo'],
                'AppFeePlus18YrsYN' => $arrayData['AppFeePlus18YrsYN'],
                'ApplicationFeeAmount' => $arrayData['ApplicationFeeAmount'],
                'Country' => $arrayData['Country'],
                'PetPolicy' => $arrayData['PetPolicy'],
                'SeniorCommunityYN' => $arrayData['SeniorCommunityYN'],
                'AccessoryUnitSF' => $arrayData['AccessoryUnitSF'],
                'AgentBothSidesAcknowledgementYN' => $arrayData['AgentBothSidesAcknowledgementYN'],
            ];
        }
        return $newArray;
    }
}
