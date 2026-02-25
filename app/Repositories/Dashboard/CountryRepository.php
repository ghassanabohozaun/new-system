<?php

namespace App\Repositories\Dashboard;

use App\Models\Country;
use App\Traits\QueryTrait;

class CountryRepository
{
    use QueryTrait;
    // get country
    public function getCountry($id)
    {
        return Country::find($id);
    }

    // get countries
    public function getCountries()
    {
        return Country::withCount(['cities'])
            ->when(!empty(request()->keyword), function ($query) {
                $query->where('name', 'like', '%' . request()->keyword . '%');
            })
            ->orderByDesc('created_at')
            ->paginate(10);
    }

    // get active countries
    public function getActiveCountries()
    {
        return Country::withCount(['cities'])
            ->orderByDesc('created_at')
            ->active()
            ->get();
    }

    // get all countries without relations
    public function getAllCountriesWithoutRelations()
    {
        return Country::get();
    }

    // get all cities by country
    public function getAllCitiesByCountry($country)
    {
        return $country->cities()->get();
    }

    // store country
    public function storeCountry($data)
    {
        return Country::create($data);
    }

    // update country
    public function updateCountry($data, $country)
    {
        return $country->update($data);
    }

    // destory country
    public function destroyCountry($country)
    {
        $country = $country->forceDelete();
        return $country;
    }

   // change status

    public function changeStatusCountry($country, $status)
    {
        return $country->update([
            'status' => $status,
        ]);
    }


    // autocomplete country
    public function autocompleteCountry($searchValue)
    {
        return $this->genericSearch(
            Country::class,
            $searchValue,
            ['name->en', 'name->ar'],
            ['name->en as country_en', 'name->ar as country_ar', 'id', 'flag_code'],
            fn($q) => $q->active()
        );
    }
}
