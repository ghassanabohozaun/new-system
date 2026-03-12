<?php

namespace App\Services\Dashboard;

use App\Repositories\Dashboard\AboutUsRepository;
use App\Utils\ImageManagerUtils;

class AboutUsService
{
    protected $aboutUsRepository;
    protected $imageManagerUtils;

    public function __construct(AboutUsRepository $aboutUsRepository, ImageManagerUtils $imageManagerUtils)
    {
        $this->aboutUsRepository = $aboutUsRepository;
        $this->imageManagerUtils = $imageManagerUtils;
    }

    public function getAboutUs()
    {
        return $this->aboutUsRepository->getAboutUs();
    }

    public function updateAboutUs($request)
    {
        $about = $this->getAboutUs();
        $data = $request->validated();

        // Handle Images
        if ($request->hasFile('vision_image')) {
            if ($about->vision_image && file_exists(public_path($about->vision_image))) {
                $this->imageManagerUtils->removeImageFromLocal($about->vision_image, 'about');
            }
            $data['vision_image'] = 'assets/uploads/about/' . $this->imageManagerUtils->saveResizeImage($request->file('vision_image'), 'about', 800, 600);
        }

        if ($request->hasFile('mission_image')) {
            if ($about->mission_image && file_exists(public_path($about->mission_image))) {
                $this->imageManagerUtils->removeImageFromLocal($about->mission_image, 'about');
            }
            $data['mission_image'] = 'assets/uploads/about/' . $this->imageManagerUtils->saveResizeImage($request->file('mission_image'), 'about', 800, 600);
        }

        if ($request->hasFile('why_us_image')) {
            if ($about->why_us_image && file_exists(public_path($about->why_us_image))) {
                $this->imageManagerUtils->removeImageFromLocal($about->why_us_image, 'about');
            }
            $data['why_us_image'] = 'assets/uploads/about/' . $this->imageManagerUtils->saveResizeImage($request->file('why_us_image'), 'about', 800, 600);
        }

        // Process Vision List
        if ($request->has('vision_list')) {
            $vision_list = [];
            foreach ($request->vision_list as $lang => $items) {
                $vision_list[$lang] = array_values(array_filter($items));
            }
            $data['vision_list'] = $vision_list;
        }

        return $this->aboutUsRepository->updateAboutUs($data);
    }
}
