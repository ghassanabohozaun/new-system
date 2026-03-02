<?php

namespace App\Services\Dashboard;

use App\Repositories\Dashboard\UserRepository;
use Yajra\DataTables\Facades\DataTables;

class UserService
{
    protected $userRepository;
    //__construct
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    // get user
    public function getUser($id)
    {
        $user = $this->userRepository->getUser($id);
        if (!$user) {
            return false;
        }
        return $user;
    }

    // get users
    public function getUsers()
    {
        return $this->userRepository->getUsers();
    }

    // get all
    public function getAll()
    {
        $users = $this->userRepository->getUsers();

        return DataTables::of($users)
            ->addIndexColumn()
            ->addColumn('name', function ($user) {
                return $user->getTranslation('name', Lang());
            })
            ->addColumn('status', function ($user) {
                return $user->status == 1 ? __('general.active') : __('general.inactive');
            })
            ->addColumn('manage_status', function ($user) {
                return view('dashboard.users.parts.status-manage', compact('user'));
            })
            ->addColumn('actions', function ($user) {
                return view('dashboard.users.parts.actions', compact('user'));
            })
            ->make(true);
    }

    // store user
    public function storeUser($data)
    {
        $user = $this->userRepository->storeUser($data);
        if (!$user) {
            return false;
        }
        return $user;
    }

    // update user
    public function updateUser($user, $data)
    {
        $user = self::getUser($data['id']);

        $user = $this->userRepository->updateUser($user, $data);
        if (!$user) {
            return false;
        }
        return $user;
    }

    // destroy user
    public function destroyUser($id)
    {
        $user = self::getUser($id);

        $user = $this->userRepository->destroyUser($user);
        if (!$user) {
            return false;
        }
        return $user;
    }

    // change status
    public function changeStatus($id, $status)
    {
        $user = self::getUser($id);
        $user = $this->userRepository->changeStatus($user, $status);
        if (!$user) {
            return false;
        }
        return $user;
    }
}
