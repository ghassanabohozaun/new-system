<?php

namespace App\Repositories\Dashboard;

use App\Models\MailingBox;

class MailingBoxRepository
{
    // get one
    public function getOne($id)
    {
        return MailingBox::find($id);
    }

    // get all
    public function getAll()
    {
        return MailingBox::when(!empty(request()->keyword), function ($query) {
            $query->where('email', 'like', '%' . request()->keyword . '%');
        })
            ->orderByDesc('created_at')
            ->select('id', 'email', 'status')
            ->paginate(20);
    }

    // create
    public function create($data)
    {
        return MailingBox::create($data);
    }

    // update
    public function update($data, $mail)
    {
        return $mail->update($data);
    }

    // destroy
    public function destroy($mail)
    {
        return $mail->forceDelete();
    }

    public function changeStatus($mail)
    {
        if ($mail->status == 'new') {
            $mail->update([
                'status' => 'contacted',
            ]);
        } else {
            $mail->update([
                'status' => 'new',
            ]);
        }
        return $mail;
    }
}
