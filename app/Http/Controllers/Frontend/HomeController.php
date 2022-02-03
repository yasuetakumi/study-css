<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Prefecture;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(){
        $data['page_title'] = 'Home Real Estate Media';
        $data['prefectures'] = Prefecture::all();

        return view('frontend.index', $data);
    }

    public function prefecture($prefecture){
        $data['page_title'] = 'Prefecture' . Str::ucfirst($prefecture);
        $data['prefecture'] = Prefecture::where('name', $prefecture)->first();
        return view('frontend.prefecture.index', $data);
    }
}
