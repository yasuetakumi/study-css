<?php

namespace App\Http\Controllers\API;

use App\Models\Property;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiPropertyHistoryController extends Controller
{
    public function getPropertyHistoryOrFavorite(Request $request)
    {
        $property_id = $request->all();
        $data = Property::whereIn('id', $property_id)->orderByRaw('FIELD (id, ' . implode(', ', $property_id) . ') DESC')->get();
        return response()->json($data);
    }
}
