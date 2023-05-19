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
            return view('user/transaction/create', $data);
        } else {
            session()->setFlashdata('error', 'Sorry, you dont have access. Please fill in your wallet first.');
            return redirect()->to(base_url('/plan'));
        }
    }

    public function save($id)
    {
        $validate = $this->validate([
            'amount' => 'required|trim',
        ]);
        if (!$validate) {
            return redirect()->to(base_url('/transaction/'.$id))->withInput();
        }
        $account = $this->UsersModel->find(session()->get('id'));
        $amount = $this->request->getPost('amount');
        if($account['main_wallet'] >= $amount){       
            $this->TransactionsModel->insert([
                'amount' =>  $amount,
                'plan_id' =>  $id,
                'no_transaction' =>  trx(),
                'is_active' =>  0,
                'user_id' => session()->get('id'),
            ]);
            session()->setFlashdata('success', 'Transaction has been processed successfully.');
            return redirect()->to(base_url('/transaction'));
        } else {
            session()->setFlashdata('error','Sorry your main wallet balance is lacking please deposit first.');
            return redirect()->to(base_url('/transaction'));
        }
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