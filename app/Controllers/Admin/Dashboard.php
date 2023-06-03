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
        $data['transaction'] = $this->TransactionsModel->getAll();
        $data['customer'] = $this->UsersModel->getUser();
        $data['allcustomer'] = $this->UsersModel->where('role', 'User')->countAllResults();
        $data['dbtrx'] = $this->TransactionsModel;
        $data['alltransaction'] = $this->TransactionsModel->where('is_active', 1)->orWhere('is_active', 4)->countAllResults();
        $data['allcontribute'] = $this->TransactionsModel->select('COUNT(*) as count')->where('is_active', 1)->orWhere('is_active', 4)->groupBy('user_id')->countAllResults();
        return view('admin/dashboard', $data);
    }
}
