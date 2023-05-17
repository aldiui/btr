<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Setting extends BaseController
{
    public function index()
    {
        $data['title'] = "Setting";
        $data['account'] = $this->UsersModel->find(session()->get('id'));
        $data['setting'] = $this->SettingsModel->find(1);
        return view('admin/setting/view', $data);
    }

    public function update()
    {
        $validate = $this->validate([
            'name' => ['rules' => 'required'],
            'description' => ['rules' => 'required'],
            'short' => ['rules' => 'required'],
        ]);

        if (!$validate) {
            return redirect()->to(base_url('/admin/setting'))->withInput();
        }

        $file = $this->request->getFile('image');
        $setting = $this->SettingsModel->find(1);
        if ($file !== null && $file->isValid()) {
            $validatedData = $this->validate([
                'image' => [
                    'rules' => 'max_size[image,10240]|mime_in[image,image/jpeg,image/png,image/jpg]',
                    'errors' => [
                        'max_size' => 'Image must be less than 10MB',
                        'mime_in' => 'Image file type must be jpeg, png, or jpg',
                    ],
                ],
            ]);

            $image = $setting['image'];
            if ($image && file_exists('assets/images/setting/'.$image)) {
                unlink('assets/images/setting/'.$image);
            }
            $newName = $file->getRandomName();
            $file->move('assets/images/setting/', $newName);
            $image = $newName;
        } else {
            $image = $setting['image'];
        }

        $this->SettingsModel->update(1, [
            'name' =>  $this->request->getPost('name'),
            'description' =>  $this->request->getPost('description'),
            'short' =>  $this->request->getPost('short'),
            'image' => $image
        ]);

        session()->setFlashdata('success', 'Your Seting data has been successfully updated');
        return redirect()->to(base_url('/admin/setting'));
    }
}