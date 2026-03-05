<?php

namespace App\Services\Dashboard;

use App\Models\City;
use App\Repositories\Dashboard\CityRepository;

class CityService
{
    protected $cityRepository;
    //__construct
    public function __construct(CityRepository $cityRepository)
    {
        $this->cityRepository = $cityRepository;
    }
    // get city
    public function getCity($id)
    {
        $city = $this->cityRepository->getCity($id);
        if (!$city) {
            return false;
        }
        return $city;
    }

    // get cities without Relations
    public function getAllCitiesWithoutRelation()
    {
        return $this->cityRepository->getAllCitiesWithoutRelation();
    }

    // get cities
    public function getCities($filters = [])
    {
        return $this->cityRepository->getCities($filters);
    }

    // get active cities
    public function getActiveCities()
    {
        return $this->cityRepository->getActiveCities();
    }

    // store city
    public function storeCity($request)
    {
        $city = $this->cityRepository->storeCity($request);
        if (!$city) {
            return false;
        }
        return $city;
    }

    // destroy city
    public function destroyCity($id)
    {
        $city = self::getCity($id);

        if (!$city) {
            return 'not_found';
        }

        if (
            $city->flights()->exists() ||
            $city->tours()->exists() ||
            $city->fromFlightTicket()->exists() ||
            $city->toFlightTicket()->exists()
        ) {
            return 'restricted';
        }

        $result = $this->cityRepository->destroyCity($city);
        return $result ? 'success' : 'failed';
    }

    // update city
    public function updateCity($request, $id)
    {
        $city = self::getCity($id);
        if (!$city) {
            return false;
        }
        $city = $this->cityRepository->updateCity($request, $id);
        if (!$city) {
            return false;
        }
        return $city;
    }

    // autocomplete
    public function autocompleteCity($searchValue, $countryId = null)
    {
        return $this->cityRepository->autocompleteCity($searchValue, $countryId);
    }
}
