<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use App\Traits\CommonToolsTraits;
use App\Http\Controllers\Controller;

class ApiUserCompanyController extends Controller
{
    use CommonToolsTraits;
    public function select2UserCompany($companyId = null)
    {
        if(empty($companyId)){
            $users = collect(User::query()->pluck('display_name', 'id')->all());
        } else {
            $users = collect(User::where('belong_company_id', $companyId)->pluck('display_name', 'id')->all());
        }

        $data      = $this->initSelect2Options($users);
        return response()->json($data);
    }
}
