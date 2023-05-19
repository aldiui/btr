<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;

class Wallet extends BaseController
{
    public function index()
    {
        $data['title'] = "Wallet";
        $data['account'] = $this->UsersModel->find(session()->get('id'));
        $data['setting'] = $this->SettingsModel->find(1);
        $data['wallet'] = $this->WalletsModel->getWallet(session()->get('id'));
        return view('user/wallet/view', $data);
    }
    
    public function create()
    {
        $data['title'] = "Wallet";
        $data['account'] = $this->UsersModel->find(session()->get('id'));
        $data['setting'] = $this->SettingsModel->find(1);
        $data['method'] = $this->MethodsModel->getMethod();
        return view('user/wallet/create', $data);
    }

    public function save()
    {
        $validate = $this->validate([
            'name' => 'required|trim|min_length[3]',
            'method' => 'required|trim',
            'wallet_address' => 'required|trim',
        ]);

        if (!$validate) {
            return redirect()->to(base_url('/wallet/create'))->withInput();
        }
        
        $this->WalletsModel->insert([
            'name' =>  $this->request->getPost('name'),
            'wallet_address' =>  $this->request->getPost('wallet_address'),
            'method_id' =>  $this->request->getPost('method'),
            'user_id' =>  session()->get('id'),
        ]);

        session()->setFlashdata('success', 'The wallet has been added successfully.');
        return redirect()->to(base_url('/wallet'));
    }

    public function edit($id)
    {
        $data['title'] = "Wallet";
        $data['account'] = $this->UsersModel->find(session()->get('id'));
        $data['setting'] = $this->SettingsModel->find(1);
        $data['method'] = $this->MethodsModel->getMethod();
        $data['wallet'] = $this->WalletsModel->find($id);
        return view('user/wallet/edit', $data);
    }

    public function update($id)
    {
        $validate = $this->validate([
            'name' => 'required|trim|min_length[3]',
            'method' => 'required|trim',
            'wallet_address' => 'required|trim',
        ]);

        if (!$validate) {
            return redirect()->to(base_url('/wallet/edit/'.$id))->withInput();
        }

        $this->WalletsModel->update($id, [
            'name' =>  $this->request->getPost('name'),
            'wallet_address' =>  $this->request->getPost('wallet_address'),
            'method_id' =>  $this->request->getPost('method'),
            'user_id' =>  session()->get('id'),
        ]);

        session()->setFlashdata('success', 'The wallet has been updated successfully.');
        return redirect()->to(base_url('/wallet'));
    }


    public function delete($id)
    {
        $this->WalletsModel->delete($id);
        session()->setFlashdata('success', 'The wallet has been deleted successfully.');
        return redirect()->to(base_url('/wallet'));
    }
}