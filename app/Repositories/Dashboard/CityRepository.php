<?php

namespace App\Repositories\Dashboard;

use App\Models\City;
use App\Traits\QueryTrait;

class CityRepository
{
    use QueryTrait;

    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    // get city
    public function getCity($id)
    {
        return City::find($id);
    }

    // get cities
    public function getCities()
    {
        $cities = City::orderByDesc('id')
            ->select('id', 'name', 'country_id')
            ->paginate(10);
        return $cities;
    }

    // get active cities
    public function getActiveCities()
    {
        return City::where('status', 1)->get();
    }

    // get cities without Relations
    public function getAllCitiesWithoutRelation()
    {
        return City::get();
    }


    // store city
    public function storeCity($request)
    {
        $city = City::create([
            'name' => [
                'en' => $request->name['en'],
                'ar' => $request->name['ar'],
            ],
            'country_id' => $request->country_id,
        ]);
        return $city;
    }

    // update city
    public function updateCity($request, $id)
    {
        $city = self::getCity($id);
        $city = $city->update([
            'name' => [
                'en' => $request->name['en'],
                'ar' => $request->name['ar'],
            ],
            'country_id' => $request->country_id,
        ]);

        return $city;
    }

    // destroy city
    public function destroyCity($city)
    {
        return $city->forceDelete();
    }
    // change status
    public function changeStatus($city, $status)
    {
        $city->update([
            'status' => $status,
        ]);
        return $city;
    }

    // autocomplete city
    public function autocompleteCity($searchValue, $countryId = null)
    {
        return $this->genericSearch(
            City::class,
            $searchValue,
            ['name->en', 'name->ar'],
            ['name->en as city_en', 'name->ar as city_ar', 'id'],
            function ($query) use ($countryId, $searchValue) {
                if ($countryId) {
                    $query->where('country_id', $countryId);
                } elseif (empty($searchValue)) {
                    // If no country is selected and the user hasn't typed anything yet,
                    // keep the list empty.
                    $query->whereRaw('1 = 0');
                }
            }
        );
    }
}
