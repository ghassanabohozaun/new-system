<?php

namespace App\Services\Dashboard;

use App\Repositories\Dashboard\AdminReporitoy;
use App\Utils\ImageManagerUtils;
use Illuminate\Support\Facades\Cache;

class AdminService
{
    /**
     * Create a new class instance.
     */

    protected $adminReporitoy, $imageManagerUtils;

    // __construct
    public function __construct(AdminReporitoy $adminReporitoy, ImageManagerUtils $imageManagerUtils)
    {
        $this->adminReporitoy = $adminReporitoy;
        $this->imageManagerUtils = $imageManagerUtils;
    }

    // get Admin
    public function getAdmin($id)
    {
        $admin = $this->adminReporitoy->getAdmin($id);
        if (!$admin) {
            return false;
            //abort(404);
        }
        return $admin;
    }

    // get admins
    public function getAdmins()
    {
        return $this->adminReporitoy->getAdmins();
    }

    // store admin
    public function storeAdmin($data)
    {
        if (array_key_exists('photo', $data) && $data['photo'] != null) {
            $data['photo'] = $this->imageManagerUtils->saveResizeImage($data['photo'], 'adminsPhotos', 100, 100);
        }

        $admin = $this->adminReporitoy->storeAdmin($data);
        if (!$admin) {
            return false;
        }
        return $admin;
    }

    //update admin
    public function updateAdmin($data)
    {
        $admin = $this->adminReporitoy->getAdmin($data['id']);
        if (!$admin) {
            return false;
        }


        $data['password'] = empty($data['password']) ? $admin->password : $data['password'];

        if (array_key_exists('photo', $data) && $data['photo'] != null) {
            $this->imageManagerUtils->removeImageFromLocal($admin->photo, 'adminsPhotos');
            $data['photo'] = $this->imageManagerUtils->saveResizeImage($data['photo'], 'adminsPhotos', 100, 100);
        } else {
            if ($admin->photo != null) {
                $data['photo'] = $admin->photo;
            } else {
                $data['photo'] = '';
            }
        }

        $updated = $this->adminReporitoy->updateAdmin($admin, $data);
        if (!$updated) {
            return false;
        }
        return $admin;
    }
    public function destroyAdmin($id)
    {
        $admin = $this->adminReporitoy->getAdmin($id);
        if (!$admin) {
            return false;
        }
        if (!empty($admin->photo)) {
            $this->imageManagerUtils->removeImageFromLocal($admin->photo, 'adminsPhotos');
        }

        $admin = $this->adminReporitoy->destroyAdmin($admin);
        if (!$admin) {
            return false;
        }
        return $admin;
    }

    // change status admin
    public function changeStatusAdmin($id, $status)
    {
        $admin = $this->adminReporitoy->getAdmin($id);
        if (!$admin) {
            return false;
        }

        $admin = $this->adminReporitoy->changeStatusAdmin($admin, $status);
        if (!$admin) {
            return false;
        }
        return $admin;
    }
}
