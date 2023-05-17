<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Transaction extends BaseController
{
    public function index()
    {
        $data['title'] = "Transaction";
        $data['account'] = $this->UsersModel->find(session()->get('id'));
        $data['setting'] = $this->SettingsModel->find(1);
        $data['transaction'] = $this->TransactionsModel->getAll();
        return view('admin/transaction/view', $data);
    }

    public function edit($id)
    {
        $data['title'] = "Detail Transaction";
        $data['account'] = $this->UsersModel->find(session()->get('id'));
        $data['setting'] = $this->SettingsModel->find(1);
        $data['transaction'] = $this->TransactionsModel->getTrxById($id);
        return view('admin/transaction/edit', $data);
    }

    public function update($id)
    {
        $transaction = $this->TransactionsModel->find($id);
        $deposit = $this->DepositsModel->where('no_transaction', $transaction['no_transaction'])->first();
        $is_active = $this->request->getPost('is_active');
        if($is_active == 1) {
            $date = date('Y-m-d H:i:s');
            $setemail = $this->EmailsModel->find(1);
            $user = $this->UsersModel->find($transaction['user_id']);
            $this->Email->setFrom($setemail['from_email'], $setemail['from_name']);
            $this->Email->setTo($user['email']);
            $this->Email->setSubject("Transaction Success");
            $data1 = [
                'transaction' => $this->TransactionsModel->getTrxById($id),
                'user' => $user,
                'setting' => $this->SettingsModel->find(1),

            ];
            $message1 = view('email/transaction', $data1);
            $this->Email->setMessage($message1);
            $this->Email->send();

            $email2 = $this->Email;
            $email2->setFrom($setemail['from_email'], $setemail['from_name']);
            $email2->setTo($user['email']);
            $email2->setSubject("Deposit Success");
            $data2 = [
                'deposit' => $this->DepositsModel->getTrxById($deposit['id']),
                'user' => $user,
                'setting' => $this->SettingsModel->find(1),
            ];
            $message2 = view('email/deposit', $data2);
            $email2->setMessage($message2);
            $email2->send();
        } else {
            $date = null;
        }
        $this->TransactionsModel->update($id, [
            'is_active' => $is_active,
            'date' => $date,
        ]);
        $this->DepositsModel->update($deposit['id'], [
            'is_active' => $is_active
        ]);
        session()->setFlashdata('success', 'The transaction has been successfully updated.');
        return redirect()->to(base_url('/admin/transaction'));
    }

    public function profit($id)
    {
        $validate = $this->validate([
            'persentace' => 'required',
            'profit' => 'required',
        ]);

        if (!$validate) {
            return redirect()->to(base_url('/admin/transaction/edit/'.$id))->withInput();
        }
        $transaction = $this->TransactionsModel->find($id);
        $setemail = $this->EmailsModel->find(1);
        $user = $this->UsersModel->find($transaction['user_id']);
        $this->Email->setFrom($setemail['from_email'], $setemail['from_name']);
        $this->Email->setTo($user['email']);
        $this->Email->setSubject("Profit Success");
        $data = [
            'transaction' => $this->TransactionsModel->getTrxById($id),
            'user' => $user,
            'setting' => $this->SettingsModel->find(1),
        ];
        $message = view('email/profit', $data);
        $this->Email->setMessage($message);
        $this->Email->send();
        $this->TransactionsModel->update($id, [
            'is_active' => 4,
            'persentace' => $this->request->getPost('persentace'),
            'profit' => $this->request->getPost('profit'),
        ]);
        $main_wallet = $user['main_wallet'] + $transaction['amount'] + $this->request->getPost('profit');
        $this->UsersModel->update($user['id'], [
            'main_wallet' => $main_wallet
        ]);
        session()->setFlashdata('success', 'Profit has been successfully updated.');
        return redirect()->to(base_url('/admin/transaction'));
    }

    public function delete($id)
    {
        $transaction = $this->TransactionsModel->find($id);
        $this->TransactionsModel->where('no_transaction', $transaction['no_transaction'])->delete();
        $this->DepositsModel->where('no_transaction', $transaction['no_transaction'])->delete();
        session()->setFlashdata('success', 'The transaction has been successfully completed.');
        return redirect()->to(base_url('/admin/transaction'));
    }
}