<?php

namespace App\Services\Dashboard;

use App\Repositories\Dashboard\TourRepository;
use App\Utils\ImageManagerUtils;
use Yajra\DataTables\Facades\DataTables;

class TourService
{
    protected $tourRepository, $imageManagerUtils;
    // __construct
    public function __construct(TourRepository $tourRepository, ImageManagerUtils $imageManagerUtils)
    {
        $this->tourRepository = $tourRepository;
        $this->imageManagerUtils = $imageManagerUtils;
    }

    // get paginated tours
    public function getToursPaginated($limit)
    {
        return $this->tourRepository->getToursPaginated($limit);
    }

    // get tour
    public function getOne($id)
    {
        $tour = $this->tourRepository->getOne($id);
        if (!$tour) {
            return false;
        }
        return $tour;
    }

    // get tours
    public function getTours()
    {
        return $this->tourRepository->getTours();
    }

    // get tours
    public function getActive()
    {
        return $this->tourRepository->getActive();
    }


    // store tour
    public function store($data)
    {
        if (array_key_exists('photo', $data) && $data['photo'] != null) {
            $photo_name = $this->imageManagerUtils->saveResizeImage($data['photo'], 'tours', 1000, 1000);
            $data['photo'] = $photo_name;
        }

        $tour = $this->tourRepository->store($data);
        if (!$tour) {
            return false;
        }
        return $tour;
    }

    //update tour
    public function update($data)
    {
        $tour = self::getOne($data['id']);
        if (!$tour) {
            return false;
        }

        if (isset($data['is_photo_deleted']) && $data['is_photo_deleted'] == "1") {
            if (!empty($tour->photo)) {
                $this->imageManagerUtils->removeImageFromLocal($tour->photo, 'tours');
            }
            $data['photo'] = null;
        } elseif (array_key_exists('photo', $data) && $data['photo'] != null) {
            $this->imageManagerUtils->removeImageFromLocal($tour->photo, 'tours');
            $photo_name = $this->imageManagerUtils->saveResizeImage($data['photo'], 'tours', 1000, 1000);
            $data['photo'] = $photo_name;
        }

        $tour = $this->tourRepository->update($tour, $data);
        if (!$tour) {
            return false;
        }
        return $tour;
    }

    // destroy tour
    public function destroy($id)
    {
        $tour = self::getOne($id);
        if (!$tour) {
            return false;
        }
        if (!empty($tour->photo)) {
            $this->imageManagerUtils->removeImageFromLocal($tour->photo, 'tours');
        }

        $tour = $this->tourRepository->destroy($tour);
        if (!$tour) {
            return false;
        }
        return $tour;
    }

    // change status
    public function changeStatus($id, $status)
    {
        $tour = self::getOne($id);
        if (!$tour) {
            return false;
        }
        $tour = $this->tourRepository->changeStatus($tour, $status);
        if (!$tour) {
            return false;
        }
        return $tour;
    }
}
