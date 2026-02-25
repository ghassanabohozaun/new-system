<?php

namespace App\Repositories\Api;

use App\Models\Country;
use App\Models\Governorate;

class AddressRepository
{
    // get countries
    public function getCountries()
    {
        return Country::get();
    }

    // get governorates
    public function getGovernorates($country_id)
    {
        $country = Country::find($country_id);
        $governorates = $country->governorates()->get();
        return $governorates;
    }

    //get cities
    public function getCities($country_id)
    {
        $country = Country::find($country_id);
        $cities = $country->cities()->get();
        return $cities;
    }
}
