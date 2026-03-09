<?php

namespace App\Repositories\Api;

use App\Models\MailingBox;

class MailingBoxRepository
{
    // get mailing list
    public function getMailingList($limit = null)
    {
        if ($limit == null) {
            return MailingBox::latest()->get();
        }
        return MailingBox::latest()->limit($limit)->get();
    }

    // store email
    public function store($data)
    {
        return MailingBox::create($data);
    }
}
