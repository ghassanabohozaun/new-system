<?php

namespace App\Repositories\Dashboard;

use App\Models\Admin;

class AdminReporitoy
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    // get admin
    public function getAdmin($id)
    {
        $admin = Admin::find($id);
        return $admin;
    }

    // get admins
    public function getAdmins()
    {
        $admins = Admin::orderByDesc('created_at')->select('id', 'name', 'email', 'password', 'status', 'role_id', 'created_at', 'photo')->paginate(5);
        return $admins;
    }

    // store admin

    public function storeAdmin($data)
    {
        return Admin::create($data);
    }

    // update admin
    public function updateAdmin($admin, $data)
    {
        return $admin->update($data);
    }

    // destroy admin
    public function destroyAdmin($admin)
    {
        return $admin->forceDelete();
    }

    // change status

    public function changeStatusAdmin($admin, $status)
    {
        return $admin->update([
            'status' => $status,
        ]);
    }
}
