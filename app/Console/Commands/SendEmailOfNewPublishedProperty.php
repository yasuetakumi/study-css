<?php

namespace App\Console\Commands;

use App\Http\Controllers\API\ApiPropertyController;
use App\Http\Controllers\Frontend\PropertyController as FrontendPropertyController;

use Illuminate\Console\Command;
use Illuminate\Http\Request;

use App\Models\CustomerSearchPreference;

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
        // 2. Get all properties where published_date is greater than or equal to now - 24 hours
        // 3. For each customer search preference
        // a. filter newly published properties
        // b. create and send an email listing the newly published properties -> [email-2] -> https://docs.google.com/spreadsheets/d/1A6MQL_ngsKy47GpHz4-M_Vvtq4VG0y1kziGXAWhLZto/edit#gid=1527319713
        // c. It is ok for the user to recieve multiple emails if they register multiple search preferences

        // Idea
        // Get all search preference
        // Looping through search preference
        // Create request and execute filter property api
        // Get filtered property which date is yesterday - today

        $customerSearchPreferences = CustomerSearchPreference::all();

        $data = $customerSearchPreferences->map(function($search, $searchKey) {
            $request= new Request();

            if (count($search->cities)) $request->merge(['city' => $search->cities->pluck('id')->toArray()]);
            if ($search->surface_min) $request->merge(['surface_min' => $search->surface_min]);
            if ($search->surface_mac) $request->merge(['surface_mac' => $search->surface_mac]);
            if ($search->rent_amount_min) $request->merge(['rent_amount_min' => $search->rent_amount_min]);
            if ($search->rent_amount_max) $request->merge(['rent_amount_max' => $search->rent_amount_max]);
            if ($search->rent_amount_min) $request->merge(['rent_amount_min' => $search->rent_amount_min]);
            if ($search->rent_amount_max) $request->merge(['rent_amount_max' => $search->rent_amount_max]);
            if ($search->skeleton_id) $request->merge(['skeleton' => $search->skeleton_id]);
            if (count($search->undergrounds)) $request->merge(['floor_under' => $search->undergrounds->pluck('id')->toArray()]);
            if (count($search->abovegrounds)) $request->merge(['floor_above' => $search->abovegrounds->pluck('id')->toArray()]);
            if (count($search->property_types)) $request->merge(['property_type' => $search->property_types->pluck('id')->toArray()]);
            if (count($search->property_preferences)) $request->merge(['property_preference' => $search->property_preferences->pluck('id')->toArray()]);
            if ($search->freetext) $request->merge(['name' => $search->freetext]);
            if ($search->walking_distance) $request->merge(['walking_distance' => $search->walking_distance]);

            // $request->merge([
            //     'station' => '',
            //     'cuisine' => '',
            // ]);

            $request->merge(['contain_date' => true]);
            $request->merge(['toJson' => 'true']);

            $response = app(ApiPropertyController::class)->getPropertyByFilter($request);
            $properties = $response->getData()->data->result;

            $response = app(FrontendPropertyController::class)->compileFilter($request);
            $searchCondition = $response->getData();

            if (count($properties) && $search->is_email_enabled) {
                return [
                    'email' => $search->customer_email,
                    'properties' => $properties,
                    'searchCondition' => $searchCondition
                ];
            }
            else {
                return null;
            }
        })->filter();

        // Todo
        // Send the email
    }
}
