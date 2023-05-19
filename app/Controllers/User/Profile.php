<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;

class Profile extends BaseController
{
    public function index()
    {
        $data['title'] = "Profile";
        $data['account'] = $this->UsersModel->find(session()->get('id'));
        $data['setting'] = $this->SettingsModel->find(1);
        $data['countries'] = $this->CountriesModel->findAll();
        $data['gender'] = ["male","female","other"];
        return view('user/profile/view', $data);
    }

    public function update()
    {
        $validate = $this->validate([
            'name' => ['rules' => 'required|trim'],
            'place_of_birth' => ['rules' => 'required|trim'],
            'date_of_birth' => ['rules' => 'required|trim'],
            'gender' => ['rules' => 'required|trim'],
            'country' => ['rules' => 'required|trim'],
            'address' => ['rules' => 'required|trim'],
        ]);

        if (!$validate) {
            return redirect()->to(base_url('/profile'))->withInput();
        }

        $file = $this->request->getFile('image');
        $user = $this->UsersModel->find(session()->get('id'));
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

        $this->UsersModel->update($user['id'], [
            'name' =>  $this->request->getPost('name'),
            'place_of_birth' =>  $this->request->getPost('place_of_birth'),
            'date_of_birth' =>  $this->request->getPost('date_of_birth'),
            'gender' =>  $this->request->getPost('gender'),
            'country_id' =>  $this->request->getPost('country'),
            'address' =>  $this->request->getPost('address'),
            'image' => $image
        ]);

        session()->setFlashdata('success', 'Your profile data has been successfully updated');
        return redirect()->to(base_url('/profile'));
    }

    public function changepassword()
    {
        $validate = $this->validate([
            'old' => ['rules' => 'required|trim'],
            'password' => ['rules' => 'required|trim|min_length[8]'],
            'confirm' => ['rules' => 'required|trim|min_length[8]|matches[password]'],
        ]);

        if (!$validate) {
            return redirect()->to(base_url('/profile'))->withInput();
        }

        $user = $this->UsersModel->find(session()->get('id'));
        $password = $this->request->getPost('old');
        $hashed_password = hash('sha256', $password.$user['salt']);

        if ($hashed_password === $user['password']) {
            $password2 = $this->request->getPost('password');
            $salt = base64_encode(random_bytes(16));
            $passwordHash = hash('sha256', $password2.$salt);
            $this->UsersModel->update($user['id'], [
                'password' => $passwordHash,
                'salt' => $salt,
            ]);
            session()->setFlashdata('success', 'Your password has been updated successfully.');
            return redirect()->to(base_url('/profile'));
        } else {
            session()->setFlashdata('error', 'The old password you entered is incorrect.');
            return redirect()->to(base_url('/profile'))->withInput();
        }
    }

}