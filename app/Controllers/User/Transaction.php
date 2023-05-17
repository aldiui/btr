<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;

class Transaction extends BaseController
{
    public function index()
    {
        $data['title'] = "Transaction";
        $data['account'] = $this->UsersModel->find(session()->get('id'));
        $data['setting'] = $this->SettingsModel->find(1);
        $data['transaction'] = $this->TransactionsModel->getTrx(session()->get('id'));
        return view('user/transaction/view', $data);
    }

    public function create($id)
    {
        
        $data['account'] = $this->UsersModel->find(session()->get('id'));
        if($data['account']['is_plan'] == 1){      
            $data['title'] = "Transaction";
            $data['plan'] = $this->PlansModel->find($id);
            $data['setting'] = $this->SettingsModel->find(1);
            $data['method'] = $this->MethodsModel->getMethod();
            return view('user/transaction/create', $data);
        } else {
            session()->setFlashdata('error', 'Sorry, you dont have access. Please fill in your wallet first.');
            return redirect()->to(base_url('/plan'));
        }
    }

    public function save($id)
    {
        $validate = $this->validate([
            'amount' => 'required',
            'method' => 'required',
            'hash' => 'required',
            'image' => 'uploaded[image]|max_size[image,1024]|is_image[image]|mime_in[image,image/jpeg,image/png,image/jpg]',
        ]);

        if (!$validate) {
            return redirect()->to(base_url('/transaction/'.$id))->withInput();
        }

        $image = $this->request->getFile('image');
        $newImageName = $image->getRandomName();
        $image->move('assets/images/transaction/', $newImageName);
        $no_transaction = trx();
        $this->TransactionsModel->insert([
            'amount' =>  $this->request->getPost('amount'),
            'method_id' =>  $this->request->getPost('method'),
            'plan_id' =>  $id,
            'no_transaction' => $no_transaction,
            'is_active' =>  0,
            'user_id' => session()->get('id'),
        ]);

        $this->DepositsModel->insert([
            'amount' =>  $this->request->getPost('amount'),
            'method_id' =>  $this->request->getPost('method'),
            'hash' =>  $this->request->getPost('hash'),
            'image' => $newImageName,
            'no_transaction' => $no_transaction,
            'is_active' =>  0,
            'user_id' => session()->get('id'),
        ]);

        session()->setFlashdata('success', 'Transaction has been processed successfully.');
        return redirect()->to(base_url('/transaction'));
    }

    public function detail($id)
    {
        $data['title'] = "Detail Transaction";
        $data['account'] = $this->UsersModel->find(session()->get('id'));
        $data['setting'] = $this->SettingsModel->find(1);
        $data['transaction'] = $this->TransactionsModel->getTrxById($id);
        return view('user/transaction/detail', $data);
    }
}