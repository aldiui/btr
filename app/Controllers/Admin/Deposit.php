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

    public function edit($id)
    {
        $data['title'] = "Detail Deposit";
        $data['account'] = $this->UsersModel->find(session()->get('id'));
        $data['setting'] = $this->SettingsModel->find(1);
        $data['deposit'] = $this->DepositsModel->getTrxById($id);
        return view('admin/deposit/edit', $data);
    }

    public function update($id)
    {
        $deposit = $this->DepositsModel->find($id);
        $is_active = $this->request->getPost('is_active');
        if($is_active == 1) {
            $date = date('Y-m-d H:i:s');
            $setemail = $this->EmailsModel->find(1);
            $user = $this->UsersModel->find($deposit['user_id']);

            $this->Email->setFrom($setemail['from_email'], $setemail['from_name']);
            $this->Email->setTo($user['email']);
            $this->Email->setSubject("Deposit Success");
            $data2 = [
                'deposit' => $this->DepositsModel->getTrxById($deposit['id']),
                'user' => $user,
                'setting' => $this->SettingsModel->find(1),
            ];
            $message2 = view('email/deposit', $data2);
            $this->Email->setMessage($message2);
            $this->Email->send();

            $main_wallet = $user['main_wallet'] + $deposit['amount'];
            $this->UsersModel->update($user['id'], [
                'main_wallet' => $main_wallet
            ]);
        }

        $this->DepositsModel->update($deposit['id'], [
            'is_active' => $is_active
        ]);
        session()->setFlashdata('success', 'The Deposit has been successfully updated.');
        return redirect()->to(base_url('/admin/deposit'));
    }

    public function delete($id)
    {
        $deposit = $this->DepositsModel->find($id);
        $image = $deposit['image'];
        if ($image && file_exists('assets/transaction/user/'.$image)) {
            if ($image != "default.jpg") {
                unlink('assets/transaction/user/'.$image);
            }
        }
        $this->DepositsModel->delete($id);
        session()->setFlashdata('success', 'The Deposit has been deleted successfully.');
        return redirect()->to(base_url('/admin/deposit'));
    }
}
