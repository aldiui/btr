<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Deposit extends BaseController
{
    public function index()
    {
        $data['title'] = "Deposit";
        $data['account'] = $this->UsersModel->find(session()->get('id'));
        $data['setting'] = $this->SettingsModel->find(1);
        $data['deposit'] = $this->DepositsModel->getAll();
        return view('admin/deposit/view', $data);
    }

    public function detail($id)
    {
        $data['title'] = "Detail Deposit";
        $data['account'] = $this->UsersModel->find(session()->get('id'));
        $data['setting'] = $this->SettingsModel->find(1);
        $data['deposit'] = $this->DepositsModel->getTrxById($id);
        return view('admin/deposit/detail', $data);
    }
}