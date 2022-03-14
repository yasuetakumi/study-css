<?php

namespace App\Console\Commands;

use App\Models\Property;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Http\Request;

use function PHPSTORM_META\map;

class SendEmailOfNewPublishedProperty extends Command {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command-1';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send email automatically to end user when there is a new property published';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle() {
        // 1. Get all customer_search_preferences
        // $customerSearchPreferences = CustomerSearchPreference::all();

        // 2. Get all properties where published_date is greater than or equal to now - 24 hours
        // $yesterday = Carbon::now()->addDay('-1')->format('Y/m/d');
        // $today = Carbon::now()->format('Y/m/d');
        // $properties = Property::whereDate('publication_date', '>=',$yesterday)->whereDate('publication_date', '<=', $today)->get();

        // 3. For each customer search preference
        // a. filter newly published properties
        // b. create and send an email listing the newly published properties -> [email-2] -> https://docs.google.com/spreadsheets/d/1A6MQL_ngsKy47GpHz4-M_Vvtq4VG0y1kziGXAWhLZto/edit#gid=1527319713
        // c. It is ok for the user to recieve multiple emails if they register multiple search preferences

        // Idea
        // Looping through search preference
        // Create request and execute filter property api
        // Get filtered property which date is yesterday - today
        // $data = $customerSearchPreferences.map(function($search, $searchKey) {
        //     $request= new Request();
        //     $request->merge([
        //         'city' => '',
        //         'station' => '',
        //         'surface_max' => '',
        //         'surface_min' => '',
        //         'rent_amount_max' => '',
        //         'rent_amount_min' => '',
        //         'transfer_price_max' => '',
        //         'transfer_price_min' => '',
        //         'furnished' => '',
        //         'skeleton' => '',
        //         'floor_under' => '',
        //         'floor_above' => '',
        //         'cuisine' => '',
        //         'walking_distance' => '',
        //         'property_type' => '',
        //         'property_preference' => '',
        //         'name' => '',
        //     ]);
        //     dd($request);
        // });
    }
}
