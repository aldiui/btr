<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;

class Withdraw extends BaseController
{
    public function index()
    {
        $data['title'] = "Withdraw";
        $data['account'] = $this->UsersModel->find(session()->get('id'));
        $data['setting'] = $this->SettingsModel->find(1);
        $data['withdraw'] = $this->WithdrawsModel->getTrx(session()->get('id'));
        return view('user/withdraw/view', $data);
    }
    
    public function create()
    {
        $data['title'] = "Withdraw";
        $data['account'] = $this->UsersModel->find(session()->get('id'));
        $data['setting'] = $this->SettingsModel->find(1);
        $data['wallet'] = $this->WalletsModel->getWallet(session()->get('id'));
        return view('user/withdraw/create', $data);
    }

    public function save()
    {
        $validate = $this->validate([
            'amount' => 'required',
            'wallet' => 'required',
        ]);

        if (!$validate) {
            return redirect()->to(base_url('/withdraw/create'))->withInput();
        }
        
        $wallet = $this->WalletsModel->find($this->request->getPost('wallet'));
        $this->WithdrawsModel->insert([
            'no_transaction' => trx(),
            'amount' =>  $this->request->getPost('amount'),
            'wallet_id' =>  $this->request->getPost('wallet'),
            'account' => $wallet['wallet_address'],
            'is_active' => 0,
            'user_id' =>  session()->get('id'),
        ]);
        session()->setFlashdata('success', 'Withdrawal request has been processed.');
        return redirect()->to(base_url('/withdraw'));
    }

    public function edit($id)
    {
        $data['title'] = "Withdraw";
        $data['account'] = $this->UsersModel->find(session()->get('id'));
        $data['setting'] = $this->SettingsModel->find(1);
        $data['wallet'] = $this->WalletsModel->getWallet(session()->get('id'));
        $data['withdraw'] = $this->WithdrawsModel->getTrxById($id);
        return view('user/withdraw/edit', $data);
    }

    public function update($id)
    {
        $validate = $this->validate([
            'amount' => 'required',
            'wallet' => 'required',
        ]);

        if (!$validate) {
            return redirect()->to(base_url('/withdraw/edit/'.$id))->withInput();
        }

        $wallet = $this->WalletsModel->find($this->request->getPost('wallet'));
        $this->WithdrawsModel->update($id, [
            'amount' =>  $this->request->getPost('amount'),
            'wallet_id' =>  $this->request->getPost('wallet'),
            'account' => $wallet['wallet_address'],
            'user_id' =>  session()->get('id'),
        ]);

        session()->setFlashdata('success', 'Withdrawal has been successfully updated.');
        return redirect()->to(base_url('/withdraw'));
    }


    public function delete($id)
    {
        $this->WithdrawsModel->delete($id);
        session()->setFlashdata('success', 'Withdrawal has been canceled.');
        return redirect()->to(base_url('/withdraw'));
    }
}