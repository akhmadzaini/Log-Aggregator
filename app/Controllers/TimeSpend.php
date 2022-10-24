<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TimeSpendModel;

class TimeSpend extends BaseController
{

    public function getAll()
    {
        $mTimeSpend = new TimeSpendModel();
        $data = $mTimeSpend->findAll();
        return $this->response->setJSON($data);
    }

    public function newEntry()
    {
        $post = $this->request->getPost();
        $mTimeSpend = new TimeSpendModel();
        $mTimeSpend->insert($post);
        $data = [
            'respon' => 'ok',
        ];
        return $this->response->setJSON($data);
    }
}
