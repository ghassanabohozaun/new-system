<?php

namespace App\Services\Dashboard;

use App\Repositories\Dashboard\MailingBoxRepository;

class MailingBoxService
{
    protected $mailingBoxRepository;
    // __constructor
    public function __construct(MailingBoxRepository $mailingBoxRepository)
    {
        $this->mailingBoxRepository = $mailingBoxRepository;
    }

    // get one
    public function getOne($id)
    {
        $mail = $this->mailingBoxRepository->getOne($id);
        if (!$mail) {
            return false;
        }
        return $mail;
    }

    // get all
    public function getAll()
    {
        return $this->mailingBoxRepository->getAll();
    }

    // create
    public function create($data)
    {
        $mail = $this->mailingBoxRepository->create($data);
        if (!$mail) {
            return false;
        }
        return $mail;
    }

    // update
    public function update($data)
    {
        $mail = self::getOne($data['id']);
        if (!$mail) {
            return false;
        }

        $mail = $this->mailingBoxRepository->update($data, $mail);
        if (!$mail) {
            return false;
        }
        return $mail;
    }

    // destroy
    public function destroy($id)
    {
        $mail = self::getOne($id);
        if (!$mail) {
            return false;
        }

        $mail = $this->mailingBoxRepository->destroy($mail);
        if (!$mail) {
            return false;
        }
        return $mail;
    }

    // change status
    public function changeStatus($id)
    {
        $mail = self::getOne($id);
        if (!$mail) {
            return false;
        }

        $mail = $this->mailingBoxRepository->changeStatus($mail);
        if (!$mail) {
            return false;
        }
        return $mail;
    }
}
