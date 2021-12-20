<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\DatatablesHelper;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Company;
use App\Models\LogActivity;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{
    public function __construct(){
    }

    public function show( Request $request , $param ){

    }

    public function index(){
        $data['page_title'] = __('label.dashboard');

        return view('backend.dashboard.index', $data);
    }
}
