<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TimeSpendModel;

class TimeSpend extends BaseController
{

    private $serverUrl = 'http://192.168.0.253/index.php/timespend';

    public function getAll()
    {
        $mTimeSpend = new TimeSpendModel();
        $data = $mTimeSpend->findAll();
        return $this->response->setJSON($data);
    }

    public function getById($id)
    {
        $mTimeSpend = new TimeSpendModel();
        $data = $mTimeSpend->where('id', $id)
            ->findAll();
        return $this->response->setJSON($data);
    }

    public function newEntry()
    {
        $post = $this->request->getPost();
        $mTimeSpend = new TimeSpendModel();
        $mTimeSpend->insert($post);

        // jika terdapat progress activity sebelumnya, 
        // maka tak perlu menambah baris baru, 
        // cukup update end time pada progres sebelumnya
        // $inProgressActivity = $this->getInProgressActivity($mTimeSpend, $post); 
        // if($inProgressActivity != null) {
        //     $where =  $mTimeSpend->getLastQuery();
        //     $this->updateProgressActivity($mTimeSpend, $inProgressActivity['id'], $post);
        //     $action = 'update ' . $where;
        // } else {
        //     $mTimeSpend->insert($post);
        //     $action = 'insert';
        // }

        $data = [
            'respon' => 'ok with insert',
        ];
        return $this->response->setJSON($data);
    }

    private function getInProgressActivity($model, $data)
    {
        $tolerance = strtotime(date('Y-m-d h:i:s', $data['start']));
        $tolerance = date('Y-m-d h:i:s', $tolerance);
        // $mTimeSpend = new TimeSpendModel();
        return $model->select('id')
            ->where('userid', $data['userid'])
            ->where('courseshortname', $data['courseshortname'])
            ->where('activity', $data['activity'])
            ->where("end > '$tolerance'")
            ->first();
    }

    private function updateProgressActivity($model, $id, $data)
    {
        return $model->where('id', $id)
            ->set('end', $data['end'])
            ->update();
    }
}
