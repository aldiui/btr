<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Customer extends BaseController
{
    public function index()
    {
        $data['title'] = "Customers";
        $data['account'] = $this->UsersModel->find(session()->get('id'));
        $data['setting'] = $this->SettingsModel->find(1);
        $data['customer'] = $this->UsersModel->getUser();
        return view('admin/customer/view', $data);
    }

    public function edit($id)
    {
        $data['title'] = "Customers";
        $data['account'] = $this->UsersModel->find(session()->get('id'));
        $data['setting'] = $this->SettingsModel->find(1);
        $data['customer'] = $this->UsersModel->find($id);
        $data['countries'] = $this->CountriesModel->findAll();
        $data['gender'] = ["male","female","other"];
        return view('admin/customer/edit', $data);
    }

    public function update($id)
    {
        $validate = $this->validate([
            'username' => ['rules' => 'required|min_length[6]'],
            'email' => ['rules' => 'required|valid_email'],
        ]);

        if (!$validate) {
            return redirect()->to(base_url('/admin/customer/edit/'.$id))->withInput();
        }

        $file = $this->request->getFile('image');
        $user = $this->UsersModel->find($id);
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

            $image = $user['image'];
            if ($image && file_exists('assets/images/user/'.$image)) {
                if ($image != "default.jpg") {
                    unlink('assets/images/user/'.$image);
                }
            }
            $newName = $file->getRandomName();
            $file->move('assets/images/user/', $newName);
            $image = $newName;
        } else {
            $image = $user['image'];
        }

        $this->UsersModel->update($id, [
            'name' =>  $this->request->getPost('name'),
            'username' =>  $this->request->getPost('username'),
            'email' =>  $this->request->getPost('email'),
            'main_wallet' =>  $this->request->getPost('main_wallet'),
            'place_of_birth' =>  $this->request->getPost('place_of_birth'),
            'date_of_birth' =>  $this->request->getPost('date_of_birth'),
            'gender' =>  $this->request->getPost('gender'),
            'country_id' =>  $this->request->getPost('country'),
            'address' =>  $this->request->getPost('address'),
            'is_active' =>  $this->request->getPost('is_active'),
            'image' => $image
        ]);

        session()->setFlashdata('success', 'The customer has been updated successfully.');
        return redirect()->to(base_url('/admin/customer'));
    }


    public function delete($id)
    {
        $customer = $this->UsersModel->find($id);
        $image = $customer['image'];
        if ($image && file_exists('assets/images/user/'.$image)) {
            if ($image != "default.jpg") {
                unlink('assets/images/user/'.$image);
            }
        }
        $this->UsersModel->delete($id);
        $this->MethodsModel->where('user_id', $id)->delete();
        session()->setFlashdata('success', 'The customer has been deleted successfully.');
        return redirect()->to(base_url('/admin/customer'));
    }

    public function changepassword()
    {
        $id = $this->request->getPost('id');
        $validate = $this->validate([
            'password' => ['rules' => 'required|min_length[8]'],
            'confirm' => ['rules' => 'required|min_length[8]|matches[password]'],
        ]);

        if (!$validate) {
            return redirect()->to(base_url('/admin/customer/edit/'.$id))->withInput();
        }

        $password = $this->request->getPost('password');
        $salt = base64_encode(random_bytes(16));
        $passwordHash = hash('sha256', $password.$salt);
        $this->UsersModel->update($id, [
            'password' => $passwordHash,
            'salt' => $salt,
        ]);
        session()->setFlashdata('success', 'The customer password has been updated successfully.');
        return redirect()->to(base_url('/admin/customer'));
    }
}
