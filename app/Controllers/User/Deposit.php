<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;

class Deposit extends BaseController
{
    public function index()
    {
        $data['title'] = "Deposit";
        $data['account'] = $this->UsersModel->find(session()->get('id'));
        $data['setting'] = $this->SettingsModel->find(1);
        $data['deposit'] = $this->DepositsModel->getTrx(session()->get('id'));
        return view('user/deposit/view', $data);
    }
    
    public function create()
    {
        $data['title'] = "Deposit";
        $data['account'] = $this->UsersModel->find(session()->get('id'));
        $data['setting'] = $this->SettingsModel->find(1);
        $data['method'] = $this->MethodsModel->getMethod();
        return view('user/deposit/create', $data);
    }

    public function save()
    {
        $validate = $this->validate([
            'amount' => 'required|trim',
            'method' => 'required|trim',
            'hash' => 'required|trim',
            'image' => 'uploaded[image]|max_size[image,1024]|is_image[image]|mime_in[image,image/jpeg,image/png,image/jpg]',
        ]);

        if (!$validate) {
            return redirect()->to(base_url('/deposit/create'))->withInput();
        }

        $image = $this->request->getFile('image');
        $newImageName = $image->getRandomName();
        $image->move('assets/images/transaction/', $newImageName);

        $this->DepositsModel->insert([
            'amount' =>  $this->request->getPost('amount'),
            'method_id' =>  $this->request->getPost('method'),
            'hash' =>  $this->request->getPost('hash'),
            'image' => $newImageName,
            'no_transaction' =>  trx(),
            'is_active' =>  0,
            'user_id' => session()->get('id'),
        ]);

        session()->setFlashdata('success', 'Deposit has been processed successfully.');
        return redirect()->to(base_url('/deposit'));
    }

    public function detail($id)
    {
        $data['title'] = "Deposit";
        $data['account'] = $this->UsersModel->find(session()->get('id'));
        $data['setting'] = $this->SettingsModel->find(1);
        $data['deposit'] = $this->DepositsModel->getTrxById($id);
        return view('user/deposit/detail', $data);
    }
}