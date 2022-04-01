<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Helpers\Select2AjaxHelper;
use App\Http\Controllers\Controller;
use App\Models\Prefecture;

class ApiPrefectureController extends Controller
{
    public function seletc2Prefecture()
    {
        return Select2AjaxHelper::set(Prefecture::query(), 'id', 'display_name');
    }
}
