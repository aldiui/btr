<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Email extends BaseController
{
    public function index()
    {
        $data['title'] = "Email";
        $data['account'] = $this->UsersModel->find(session()->get('id'));
        $data['setting'] = $this->SettingsModel->find(1);
        $data['email'] = $this->EmailsModel->find(1);
        return view('admin/email/view', $data);
    }

    public function update()
    {
        $validate = $this->validate([
            'from_email' => ['rules' => 'required|trim'],
            'from_name' => ['rules' => 'required|trim'],
            'user_agent' => ['rules' => 'required|trim'],
            'protocol' => ['rules' => 'required|trim'],
            'mail_path' => ['rules' => 'required|trim'],
            'smtp_host' => ['rules' => 'required|trim'],
            'smtp_user' => ['rules' => 'required|trim'],
            'smtp_pass' => ['rules' => 'required|trim'],
            'smtp_port' => ['rules' => 'required|trim'],
            'smtp_timeout' => ['rules' => 'required|trim'],
            'smtp_crypto' => ['rules' => 'required|trim'],
            'wrap_chars' => ['rules' => 'required|trim'],
            'mail_type' => ['rules' => 'required|trim'],
            'charset' => ['rules' => 'required|trim'],
            'priority' => ['rules' => 'required|trim'],
            'crlf' => ['rules' => 'required|trim'],
            'newline' => ['rules' => 'required|trim'],
            'bcc_batch_size' => ['rules' => 'required|trim'],
        ]);

        if (!$validate) {
            return redirect()->to(base_url('/admin/email'))->withInput();
        }


        $this->EmailsModel->update(1, [
            'from_email' =>  $this->request->getPost('from_email'),
            'from_name' =>  $this->request->getPost('from_name'),
            'recipients' =>  $this->request->getPost('recipients'),
            'user_agent' =>  $this->request->getPost('user_agent'),
            'protocol' =>  $this->request->getPost('protocol'),
            'mail_path' =>  $this->request->getPost('mail_path'),
            'smtp_host' =>  $this->request->getPost('smtp_host'),
            'smtp_user' =>  $this->request->getPost('smtp_user'),
            'smtp_pass' =>  $this->request->getPost('smtp_pass'),
            'smtp_port' =>  $this->request->getPost('smtp_port'),
            'smtp_timeout' =>  $this->request->getPost('smtp_timeout'),
            'smtp_keep_alive' =>  $this->request->getPost('smtp_keep_alive'),
            'smtp_crypto' =>  $this->request->getPost('smtp_crypto'),
            'word_wrap' =>  $this->request->getPost('word_wrap'),
            'wrap_chars' =>  $this->request->getPost('wrap_chars'),
            'mail_type' =>  $this->request->getPost('mail_type'),
            'charset' =>  $this->request->getPost('charset'),
            'validate' =>  $this->request->getPost('validate'),
            'priority' =>  $this->request->getPost('priority'),
            'crlf' =>  $this->request->getPost('crlf'),
            'newline' =>  $this->request->getPost('newline'),
            'bcc_batch_mode' =>  $this->request->getPost('bcc_batch_mode'),
            'bcc_batch_size' =>  $this->request->getPost('bcc_batch_size'),
            'dsn' =>  $this->request->getPost('dsn'),
        ]);

        session()->setFlashdata('success', 'Your Email data has been successfully updated');
        return redirect()->to(base_url('/admin/email'));
    }
}