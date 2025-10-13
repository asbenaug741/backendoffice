<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\CityResource;
use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    //
    public function index()
    {
        $cities = City::withCount('OfficeSpaces')->get();
        return CityResource::collection($cities);
    }

    public function show(City $city)
    {
        $city->load(['OfficeSpaces.city', 'OfficeSpaces.photos']);
        $city->loadCount('OfficeSpaces');

        return new CityResource($city);
    }
}
