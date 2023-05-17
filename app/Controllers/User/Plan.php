<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;

class Plan extends BaseController
{
    public function index()
    {
        $data['title'] = "Privatesale Contribute";
        $data['account'] = $this->UsersModel->find(session()->get('id'));
        $data['setting'] = $this->SettingsModel->find(1);
        $data['plan'] = $this->PlansModel->getPlan();
        return view('user/plan/view', $data);
    }
    
}