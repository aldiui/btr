<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Whitelist extends BaseController
{
    public function index()
    {
        $data['title'] = "Whitelist";
        $data['account'] = $this->UsersModel->find(session()->get('id'));
        $data['setting'] = $this->SettingsModel->find(1);
        $data['whitelist'] = $this->UsersModel->getWhiteList();
        return view('admin/whitelist/view', $data);
    }

    public function edit($id)
    {
        $data['title'] = "Whitelist";
        $data['account'] = $this->UsersModel->find(session()->get('id'));
        $data['setting'] = $this->SettingsModel->find(1);
        $data['user'] = $this->UsersModel->find($id);
        $data['wallet'] = $this->WalletsModel->getWallet($id);
        return view('admin/whitelist/edit', $data);
    }

    public function update($id)
    {
        $is_plan = $this->request->getPost('is_plan');
        if($is_plan == null){
            session()->setFlashdata('error', 'Sorry, you did not click on Active for your investment plan.');
            return redirect()->to(base_url('/admin/whitelist'));
        } else {
            $this->UsersModel->update($id, [
                'is_plan' => $is_plan
            ]);
            session()->setFlashdata('success', 'Your investment plan is now accessible.');
            return redirect()->to(base_url('/admin/whitelist'));
        }
    }
}