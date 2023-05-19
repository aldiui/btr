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
        $data['wallet_user'] = ['Main Wallet','Dividen Wallet'];
        return view('user/withdraw/create', $data);
    }

    public function save()
    {
        $validate = $this->validate([
            'amount' => 'required|trim',
            'wallet' => 'required|trim',
            'wallet_user' => 'required|trim',
        ]);

        if (!$validate) {
            return redirect()->to(base_url('/withdraw/create'))->withInput();
        }

        $account = $this->UsersModel->find(session()->get('id'));
        $amount = $this->request->getPost('amount');
        $wallet = $this->WalletsModel->find($this->request->getPost('wallet'));
        $wallet_user = $this->request->getPost('wallet_user');

        if($wallet_user == "Main Wallet") {
            if($account['main_wallet'] >= $amount) {
                $this->WithdrawsModel->insert([
                    'no_transaction' => trx(),
                    'amount' =>  $this->request->getPost('amount'),
                    'wallet_id' =>  $this->request->getPost('wallet'),
                    'wallet_user' =>  $wallet_user,
                    'account' => $wallet['wallet_address'],
                    'is_active' => 0,
                    'user_id' =>  session()->get('id'),
                ]);
                session()->setFlashdata('success', 'Withdrawal request has been processed.');
                return redirect()->to(base_url('/withdraw'));
            } else {
                session()->setFlashdata('error', 'Sorry your main wallet balance is lacking.');
                return redirect()->to(base_url('/withdraw/create'));
            }
        } elseif($wallet_user == "Dividen Wallet") {
            if($account['dividen_wallet'] >= $amount) {
                $this->WithdrawsModel->insert([
                    'no_transaction' => trx(),
                    'amount' =>  $this->request->getPost('amount'),
                    'wallet_id' =>  $this->request->getPost('wallet'),
                    'wallet_user' =>  $wallet_user,
                    'account' => $wallet['wallet_address'],
                    'is_active' => 0,
                    'user_id' =>  session()->get('id'),
                ]);
                session()->setFlashdata('success', 'Withdrawal request has been processed.');
                return redirect()->to(base_url('/withdraw'));
            } else {
                session()->setFlashdata('error', 'Sorry your dividen wallet balance is lacking.');
                return redirect()->to(base_url('/withdraw/create'));
            }
        }
    }

    public function edit($id)
    {
        $data['title'] = "Withdraw";
        $data['account'] = $this->UsersModel->find(session()->get('id'));
        $data['setting'] = $this->SettingsModel->find(1);
        $data['wallet'] = $this->WalletsModel->getWallet(session()->get('id'));
        $data['withdraw'] = $this->WithdrawsModel->getTrxById($id);
        $data['wallet_user'] = ['Main Wallet','Dividen Wallet'];
        return view('user/withdraw/edit', $data);
    }

    public function update($id)
    {
        $validate = $this->validate([
            'amount' => 'required|trim',
            'wallet' => 'required|trim',
            'wallet_user' => 'required|trim',
        ]);

        if (!$validate) {
            return redirect()->to(base_url('/withdraw/edit/'.$id))->withInput();
        }

        $account = $this->UsersModel->find(session()->get('id'));
        $amount = $this->request->getPost('amount');
        $wallet = $this->WalletsModel->find($this->request->getPost('wallet'));
        $wallet_user = $this->request->getPost('wallet_user');

        if($wallet_user == "Main Wallet") {
            if($account['main_wallet'] >= $amount) {
                $this->WithdrawsModel->update($id,[
                    'no_transaction' => trx(),
                    'amount' =>  $this->request->getPost('amount'),
                    'wallet_id' =>  $this->request->getPost('wallet'),
                    'wallet_user' =>  $wallet_user,
                    'account' => $wallet['wallet_address'],
                    'user_id' =>  session()->get('id'),
                ]);
                session()->setFlashdata('success', 'Withdrawal request has been updated.');
                return redirect()->to(base_url('/withdraw'));
            } else {
                session()->setFlashdata('error', 'Sorry your main wallet balance is lacking.');
                return redirect()->to(base_url('/withdraw/edit/'.$id));
            }
        } elseif($wallet_user == "Dividen Wallet") {
            if($account['dividen_wallet'] >= $amount) {
                $this->WithdrawsModel->update($id,[
                    'no_transaction' => trx(),
                    'amount' =>  $this->request->getPost('amount'),
                    'wallet_id' =>  $this->request->getPost('wallet'),
                    'wallet_user' =>  $wallet_user,
                    'account' => $wallet['wallet_address'],
                    'user_id' =>  session()->get('id'),
                ]);
                session()->setFlashdata('success', 'Withdrawal request has been updated.');
                return redirect()->to(base_url('/withdraw'));
            } else {
                session()->setFlashdata('error', 'Sorry your dividen wallet balance is lacking.');
                return redirect()->to(base_url('/withdraw/edit/'.$id));
            }
        }
    }


    public function delete($id)
    {
        $this->WithdrawsModel->delete($id);
        session()->setFlashdata('success', 'Withdrawal has been canceled.');
        return redirect()->to(base_url('/withdraw'));
    }
}