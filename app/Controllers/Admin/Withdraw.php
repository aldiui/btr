<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Withdraw extends BaseController
{
    public function index()
    {
        $data['title'] = "Withdraw";
        $data['account'] = $this->UsersModel->find(session()->get('id'));
        $data['setting'] = $this->SettingsModel->find(1);
        $data['withdraw'] = $this->WithdrawsModel->getAll();
        return view('admin/withdraw/view', $data);
    }

    public function edit($id)
    {
        $data['title'] = "Withdraw";
        $data['account'] = $this->UsersModel->find(session()->get('id'));
        $data['setting'] = $this->SettingsModel->find(1);
        $data['wallet'] = $this->WalletsModel->getWallet(session()->get('id'));
        $data['withdraw'] = $this->WithdrawsModel->getTrxById($id);
        return view('admin/withdraw/edit', $data);
    }

    public function update($id)
    {
        $withdraw = $this->WithdrawsModel->find($id);
        $is_active = $this->request->getPost('is_active');
        if($is_active == 1) {
            $user = $this->UsersModel->find($withdraw['user_id']);
            if($withdraw['wallet_user'] == "Main Wallet"){      
                $main_wallet = $user['main_wallet'] - $withdraw['amount'];
                $this->UsersModel->update($withdraw['user_id'], [
                    'main_wallet' => $main_wallet,
                ]);
            } elseif ($withdraw['wallet_user'] == "Dividen Wallet") {
                $dividen_wallet = $user['dividen_wallet'] - $withdraw['amount'];
                $this->UsersModel->update($withdraw['user_id'], [
                    'dividen_wallet' => $dividen_wallet,
                ]);
            } 
            
            $setemail = $this->EmailsModel->find(1);
            $this->Email->setFrom($setemail['from_email'], $setemail['from_name']);
            $this->Email->setTo($user['email']);
            $this->Email->setSubject("Withdraw Success");
            $data = [
                'withdraw' => $this->WithdrawsModel->getTrxById($id),
                'user' => $user,
                'setting' => $this->SettingsModel->find(1),
            ];
            $message = view('email/withdraw', $data);
            $this->Email->setMessage($message);
            $this->Email->send();
        }
        $this->WithdrawsModel->update($id, [
            'is_active' => $is_active
        ]);
        session()->setFlashdata('success', 'Withdrawal has been successfully updated.');
        return redirect()->to(base_url('/admin/withdraw'));
    }

    public function delete($id)
    {
        $this->WithdrawsModel->delete($id);
        session()->setFlashdata('success', 'Withdrawal has been canceled.');
        return redirect()->to(base_url('/admin/withdraw'));
    }
}