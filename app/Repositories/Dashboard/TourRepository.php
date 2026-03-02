<?php

namespace App\Repositories\Dashboard;

use App\Models\Tour;

class TourRepository
{
    // get one tour
    public function getOne($id)
    {
        return Tour::find($id);
    }

    // get Tours
    public function getTours()
    {
        return Tour::get();
    }

    // get all tours
    public function getAll($request)
    {
        return Tour::orderByDesc('created_at')
            ->when(!empty(request()->price), function ($query) {
                $query->where('price', request()->price);
            })
            ->when(!empty(request()->name_ar), function ($query) {
                $query->where('name->ar', 'like', '%' . request()->name_ar . '%');
            })
            ->when(!empty(request()->name_en), function ($query) {
                $query->where('name->en', 'like', '%' . request()->name_en . '%');
            })
            ->when(!empty(request()->country_id), function ($query) {
                $query->where('country_id', request()->country_id);
            })
            ->when(!empty(request()->city_id), function ($query) {
                $query->where('city_id', request()->city_id);
            })
            ->when(request()->status != null, function ($query) {
                $query->where('status', request()->status);
            })
            ->select('id', 'name', 'title', 'details', 'price', 'country_id', 'city_id', 'tour_guide_name', 'photo', 'status', 'created_at')
            ->latest()
            ->get();
    }

    // get paginated tours
    public function getToursPaginated($limit)
    {
        return Tour::orderByDesc('created_at')
            ->when(!empty(request()->price), function ($query) {
                $query->where('price', request()->price);
            })
            ->when(!empty(request()->name_ar), function ($query) {
                $query->where('name->ar', 'like', '%' . request()->name_ar . '%');
            })
            ->when(!empty(request()->name_en), function ($query) {
                $query->where('name->en', 'like', '%' . request()->name_en . '%');
            })
            ->when(!empty(request()->country_id), function ($query) {
                $query->where('country_id', request()->country_id);
            })
            ->when(!empty(request()->city_id), function ($query) {
                $query->where('city_id', request()->city_id);
            })
            ->when(request()->status != null, function ($query) {
                $query->where('status', request()->status);
            })
            ->select('id', 'name', 'title', 'details', 'price', 'country_id', 'city_id', 'tour_guide_name', 'photo', 'status', 'created_at')
            ->paginate($limit);
    }

    // get active tours
    public function getActive()
    {
        return Tour::orderByDesc('created_at')->active()->select('id', 'name',
        'title', 'details', 'price', 'country_id', 'city_id', 'tour_guide_name',
         'photo', 'status', 'created_at')->get();
    }

    // store tour
    public function store($tour)
    {
        return Tour::create($tour);
    }

    //update tour
    public function update($tour, $data)
    {
        return $tour->update($data);
    }

    // destroy tour
    public function destroy($tour)
    {
        return $tour->forceDelete();
    }

    public function changeStatus($tour, $status)
    {
        $tour->update([
            'status' => $status,
        ]);
        return $tour;
    }
}
