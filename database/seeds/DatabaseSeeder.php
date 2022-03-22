<?php

use Illuminate\Database\Seeder;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     * @return void
     */
    public function run(){
        /** Clear Uploads Folder **/
        $path = public_path('uploads');
        $file = new Filesystem;
        if (!$file->exists($path)) {
            $file->makeDirectory($path);

        // $this->call(DesignStylesTableSeeder::class);
    }
        $file->cleanDirectory( public_path('uploads') );

        /** Clear Storage Files, works on s3 driver **/
        $storageFiles =   Storage::allFiles();
        Storage::delete($storageFiles);

        $this->call(AdminRoleSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(CompanySeeder::class);
        $this->call(UserRoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(NewsSeeder::class);
        $this->call(PostcodeSeeder::class);
        $this->call(LogActivitySeeder::class);
        $this->call(FeatureSeeder::class);
        $this->call(AreaSeeder::class);
        $this->call(PrefectureSeeder::class);
        $this->call(SurfaceAreaOptionSeeder::class);
        $this->call(RentPriceOptionSeeder::class);
        $this->call(PropertyTypeSeeder::class);
        $this->call(StructureSeeder::class);
        $this->call(BusinessTermSeeder::class);
        $this->call(CuisineSeeder::class);
        $this->call(CitySeeder::class);
        $this->call(StationsLineSeeder::class);
        $this->call(StationSeeder::class);
        $this->call(PropertyPublicationStatusesSeeder::class);
        $this->call(PropertySeeder::class);
        $this->call(ContactUsTypeSeeder::class);
        $this->call(CustomerInquirySeeder::class);

        //estimation index
        $this->call(AreaGroupSeeder::class);
        $this->call(DesignPlanStatusSeeder::class);
        $this->call(TagArchitectureSeeder::class);
        $this->call(TagColorSeeder::class);
        $this->call(TagMoodSeeder::class);
        $this->call(TagStyleSeeder::class);
        $this->call(DesignStyleSeeder::class);
        $this->call(PlanSeeder::class);
        $this->call(EstimationIndexSeeder::class);

        $this->call(NumberOfFloorAbovegroundSeeder::class);
        $this->call(NumberOfFloorUndergroundSeeder::class);
        $this->call(WalkingDistanceFromStationOptionSeeder::class);
        $this->call(TransferPriceOptionSeeder::class);
        $this->call(PermittedActivitySeeder::class);
        $this->call(PropertyPreferenceSeeder::class);
        $this->call(PropertiesPermittedActivitySeeder::class);
        $this->call(PropertiesPropertyPreferenceSeeder::class);
        $this->call(PropertyStationSeeder::class);

        $this->call(PropertyPlanSeeder::class);

        //Customer Search Preference
        $this->call(CustomerSkeletonPreferenceSeeder::class);
        $this->call(CustomerSearchPreferenceSeeder::class);
        $this->call(CustomerSearchPreferenceCitySeeder::class);
        $this->call(CustomerSearchPreferencesPropertyPreferenceSeeder::class);
        $this->call(CustomerSearchPreferencesPropertyTypeSeeder::class);
        $this->call(CustomerSearchPreferencesFloorAboveSeeder::class);
        $this->call(CustomerSearchPreferencesFloorUnderSeeder::class);

    }
}
