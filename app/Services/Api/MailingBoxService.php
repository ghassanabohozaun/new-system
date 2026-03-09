<?php

namespace App\Services\Api;

use App\Repositories\Api\MailingBoxRepository;

class MailingBoxService
{
    protected $mailingBoxRepository;

    public function __construct(MailingBoxRepository $mailingBoxRepository)
    {
        $this->mailingBoxRepository = $mailingBoxRepository;
    }

    // get mailing list
    public function getMailingList($limit = null)
    {
        return $this->mailingBoxRepository->getMailingList($limit);
    }

    // store email
    public function store($data)
    {
        return $this->mailingBoxRepository->store($data);
    }
}
