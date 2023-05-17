<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;

class Deposit extends BaseController
{
    public function index()
    {
        $data['title'] = "Deposit";
        $data['account'] = $this->UsersModel->find(session()->get('id'));
        $data['setting'] = $this->SettingsModel->find(1);
        $data['deposit'] = $this->DepositsModel->getTrx(session()->get('id'));
        return view('user/deposit/view', $data);
    }

    public function detail($id)
    {
        $data['title'] = "Detail Deposit";
        $data['account'] = $this->UsersModel->find(session()->get('id'));
        $data['setting'] = $this->SettingsModel->find(1);
        $data['deposit'] = $this->DepositsModel->getTrxById($id);
        return view('user/deposit/detail', $data);
    }
}