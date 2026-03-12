<?php

namespace App\Repositories\Dashboard;

use App\Models\AboutUs;
use App\Traits\QueryTrait;

class AboutUsRepository
{
    use QueryTrait;

    public function getAboutUs()
    {
        return AboutUs::first();
    }

    public function updateAboutUs($data)
    {
        $about = $this->getAboutUs();
        if ($about) {
            $about->update($data);
            return $about;
        }
        return false;
    }
}
