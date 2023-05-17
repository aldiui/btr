<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Method extends BaseController
{
    public function index()
    {
        $data['title'] = "Method Payments";
        $data['account'] = $this->UsersModel->find(session()->get('id'));
        $data['setting'] = $this->SettingsModel->find(1);
        $data['method'] = $this->MethodsModel->findAll();
        return view('admin/method/view', $data);
    }

    public function create()
    {
        $data['title'] = "Method Payments";
        $data['account'] = $this->UsersModel->find(session()->get('id'));
        $data['setting'] = $this->SettingsModel->find(1);
        return view('admin/method/create', $data);
    }

    public function save()
    {
        $validate = $this->validate([
            'name' => 'required|min_length[3]',
            'network' => 'required|min_length[3]',
            'wallet_address' => 'required',
            'image' => 'uploaded[image]|max_size[image,1024]|is_image[image]|mime_in[image,image/jpeg,image/png,image/jpg]',
            'wallet_image' => 'uploaded[wallet_image]|max_size[wallet_image,1024]|is_image[wallet_image]|mime_in[image,image/jpeg,image/png,image/jpg]'
        ]);

        if (!$validate) {
            return redirect()->to(base_url('/admin/method/create'))->withInput();
        }

        $image = $this->request->getFile('image');
        $walletImage = $this->request->getFile('wallet_image');
        $newImageName = $image->getRandomName();
        $newWalletImageName = $walletImage->getRandomName();
        $image->move('assets/images/method/', $newImageName);
        $walletImage->move('assets/images/method/', $newWalletImageName);
        $this->MethodsModel->insert([
            'name' =>  $this->request->getPost('name'),
            'network' =>  $this->request->getPost('network'),
            'wallet_address' =>  $this->request->getPost('wallet_address'),
            'is_active' =>  $this->request->getPost('is_active'),
            'image' => $newImageName,
            'wallet_image' => $newWalletImageName
        ]);

        session()->setFlashdata('success', 'The payment method has been added successfully.');
        return redirect()->to(base_url('/admin/method'));
    }

    public function edit($id)
    {
        $data['title'] = "Method Payments";
        $data['account'] = $this->UsersModel->find(session()->get('id'));
        $data['setting'] = $this->SettingsModel->find(1);
        $data['method'] = $this->MethodsModel->find($id);
        return view('admin/method/edit', $data);
    }

    public function update($id)
    {
        $validate = $this->validate([
            'name' => 'required|min_length[3]',
            'network' => 'required|min_length[3]',
            'wallet_address' => 'required',
        ]);

        if (!$validate) {
            return redirect()->to(base_url('/admin/method/edit/'.$id))->withInput();
        }

        $method = $this->MethodsModel->find($id);
        $image = $this->request->getFile('image');
        if ($image !== null && $image->isValid()) {
            $validatedData = $this->validate([
                'image' => [
                    'rules' => 'max_size[image,10240]|mime_in[image,image/jpeg,image/png,image/jpg]',
                    'errors' => [
                        'max_size' => 'Image must be less than 10MB',
                        'mime_in' => 'Image file type must be jpeg, png, or jpg',
                    ],
                ],
            ]);

            $oldimage = $method['image'];
            if ($oldimage && file_exists('assets/images/method/' . $oldimage)) {
                unlink('assets/images/method/' . $oldimage);
            }
            $newName = $image->getRandomName();
            $image->move('assets/images/method/', $newName);
            $newImageName = $newName;
        } else {
            $newImageName = $method['image'];
        }

        $wallet_image = $this->request->getFile('wallet_image');
        if ($wallet_image !== null && $wallet_image->isValid()) {
            $validatedData = $this->validate([
                'wallet_image' => [
                    'rules' => 'max_size[wallet_image,10240]|mime_in[wallet_image,wallet_image/jpeg,wallet_image/png,wallet_image/jpg]',
                    'errors' => [
                        'max_size' => 'Image must be less than 10MB',
                        'mime_in' => 'Image file type must be jpeg, png, or jpg',
                    ],
                ],
            ]);

            $oldwalletimage = $method['wallet_image'];
            if ($oldwalletimage && file_exists('assets/images/method/' . $oldwalletimage)) {
                unlink('assets/images/method/' . $oldwalletimage);
            }
            $newName = $wallet_image->getRandomName();
            $wallet_image->move('assets/images/method/', $newName);
            $newWalletImageName = $newName;
        } else {
            $newWalletImageName = $method['wallet_image'];
        }

        $this->MethodsModel->update($id, [
            'name' =>  $this->request->getPost('name'),
            'network' =>  $this->request->getPost('network'),
            'wallet_address' =>  $this->request->getPost('wallet_address'),
            'is_active' =>  $this->request->getPost('is_active'),
            'image' => $newImageName,
            'wallet_image' => $newWalletImageName
        ]);

        session()->setFlashdata('success', 'The payment method has been updated successfully.');
        return redirect()->to(base_url('/admin/method'));
    }


    public function delete($id)
    {
        $method = $this->MethodsModel->find($id);
        $image = $method['image'];
        if ($image && file_exists('assets/images/method/' . $image)) {
            unlink('assets/images/method/' . $image);
        }
        $wallet_image = $method['wallet_image'];
        if ($wallet_image && file_exists('assets/images/method/' . $wallet_image)) {
            unlink('assets/images/method/' . $wallet_image);
        }
        $this->MethodsModel->delete($id);
        session()->setFlashdata('success', 'The payment method has been deleted successfully.');
        return redirect()->to(base_url('/admin/method'));
    }

}