<?php
// -----------------------------------------------------------------------------
namespace App\Console\Commands;
// -----------------------------------------------------------------------------

// -----------------------------------------------------------------------------
use Illuminate\Support\Facades\Mail;
use Illuminate\Console\Command;
use Illuminate\Http\Request;
use App\Http\Controllers\API\ApiPropertyController;
use App\Http\Controllers\Frontend\PropertyController as FrontendPropertyController;
use App\Mail\NewPropertyPublished;
use App\Models\CustomerSearchPreference;
use App\Models\WalkingDistanceFromStationOption;
// -----------------------------------------------------------------------------

// -----------------------------------------------------------------------------
class SendEmailOfNewPublishedProperty extends Command {
    // -------------------------------------------------------------------------
    // The name and signature of the console command.
    // -------------------------------------------------------------------------
    protected $signature = 'command-1';
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // The console command description.
    // -------------------------------------------------------------------------
    protected $description = 'Send email automatically to end user when there is a new property published';
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // Create a new command instance.
    // -------------------------------------------------------------------------
    public function __construct() {
        parent::__construct();
    }
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // Execute the console command.
    // -------------------------------------------------------------------------
    public function handle() {
        // Instruction
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

        // ---------------------------------------------------------------------
        // Get all customer preferences
        // ---------------------------------------------------------------------
        $customerSearchPreferences = CustomerSearchPreference::all();
        // ---------------------------------------------------------------------

        // ---------------------------------------------------------------------
        // Get matched properties
        // ---------------------------------------------------------------------
        $data = $customerSearchPreferences->map(function($search, $searchKey) {
            // -----------------------------------------------------------------
            // Create new request
            // -----------------------------------------------------------------
            $request= new Request();
            // -----------------------------------------------------------------

            // -----------------------------------------------------------------
            // Add search condition to request
            // -----------------------------------------------------------------
            if (count($search->cities)) $request->merge(['city' => $search->cities->pluck('id')->toArray()]);
            if (count($search->stations)) $request->merge(['station' => $search->stations->pluck('id')->toArray()]);
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
            // if ($search->walking_distance) {
            //     $walkingDistance = WalkingDistanceFromStationOption::find($search->walking_distance);
            //     $request->merge(['walking_distance' => $walkingDistance->value]);
            // };
            if (count($search->cuisines)) $request->merge(['cuisine' => $search->cuisines->pluck('id')->toArray()]);
            // -----------------------------------------------------------------

            // -----------------------------------------------------------------
            // Add publication date condition to request
            // -----------------------------------------------------------------
            $request->merge(['contain_date' => true]);
            $request->merge(['toJson' => 'true']);
            // -----------------------------------------------------------------

            // -----------------------------------------------------------------
            // Get properties match with the condition
            // -----------------------------------------------------------------
            $response = app(ApiPropertyController::class)->getPropertyByFilter($request);
            $properties = $response->getData()->data->result;
            // -----------------------------------------------------------------

            // -----------------------------------------------------------------
            // Get compiled search condition
            // -----------------------------------------------------------------
            $response = app(FrontendPropertyController::class)->compileFilter($request);
            $searchCondition = $response->getData();
            // -----------------------------------------------------------------

            // -----------------------------------------------------------------
            // Compile data if properties found
            // -----------------------------------------------------------------
            if (count($properties) && $search->is_email_enabled) {
                $searchCondition = collect($searchCondition)->except(['created_at', 'number_of_match_property', 'url']);
                if (!count($searchCondition)) $searchCondition['-'] = 'no condition';

                return [
                    'email' => $search->customer_email,
                    'properties' => $properties,
                    'searchCondition' => $searchCondition
                ];
            }
            // -----------------------------------------------------------------
            else return null;
            // -----------------------------------------------------------------
        })->filter();
        // ---------------------------------------------------------------------

        // ---------------------------------------------------------------------
        // Send the email to customer
        // ---------------------------------------------------------------------
        foreach ($data as $key => $row) {
            $row = (object) $row;

            $requiredSearchConditionKey = [
                'surfaceMin', 'surfaceMax', '譲渡額下限', '譲渡額上限', 'rentAmountMin', 'rentAmountMax'
            ];

            // Assign unfound key to null so we dont have to check the if the key exist in blade
            foreach ($requiredSearchConditionKey as $key) {
                if (!array_key_exists($key, $row->searchCondition->toArray())) {
                    $row->searchCondition[$key] = null;
                }
            }

            env('BCC_PROPERTY_INQUIRY') ?
                Mail::to($row->email)->bcc(env('BCC_PROPERTY_INQUIRY'))->send(new NewPropertyPublished($row))
                : Mail::to($row->email)->send(new NewPropertyPublished($row));
        }
        // ---------------------------------------------------------------------
    }
    // -------------------------------------------------------------------------
}
// -----------------------------------------------------------------------------
