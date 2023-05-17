<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        $data['title'] = "Dashboard";
        $data['account'] = $this->UsersModel->find(session()->get('id'));
        $data['setting'] = $this->SettingsModel->find(1);
        return view('admin/dashboard', $data);
    }
}