<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Auth extends BaseController
{
    public function index()
    {
        $role = session()->get('role');
        if($role == "admin") {
            return redirect()->to(base_url('/admin/dashboard'));
        } elseif($role == "user") {
            return redirect()->to(base_url('/dashboard'));
        }
        $data['title'] = "Login";
        $data['setting'] = $this->SettingsModel->find(1);
        return view('auth/login', $data);
    }

    public function register()
    {
        $data['title'] = "Register";
        $data['setting'] = $this->SettingsModel->find(1);
        $data['countries'] = $this->CountriesModel->findAll();
        return view('auth/register', $data);
    }

    public function login()
    {
        $validate = $this->validate([
            'email' => 'required|trim',
            'password' => 'required|trim|min_length[8]',
        ]);

        if (!$validate) {
            return redirect()->to(base_url('/'))->withInput();
        }

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $user = $this->UsersModel->checkUser($email);

        if ($user) {
            if ($user['is_active'] == 1) {
                $hashed_password = hash('sha256', $password.$user['salt']);
                if ($hashed_password === $user['password']) {
                    session()->set([
                        'id' => $user['id'],
                        'role'  => $user['role'],
                    ]);
                    if ($user['role'] == "user") {
                        session()->setFlashdata('success', 'You have successfully logged in');
                        return redirect()->to(base_url('/dashboard'));
                    } elseif ($user['role'] == "admin") {
                        session()->setFlashdata('success', 'You have successfully logged in');
                        return redirect()->to(base_url('/admin/dashboard'));
                    }
                } else {
                    session()->setFlashdata('error', 'The password you entered is incorrect');
                    return redirect()->to(base_url('/'))->withInput();
                }
            } else {
                session()->setFlashdata('error', 'Sorry, the username or email you entered is not registered');
                return redirect()->to(base_url('/'))->withInput();
            }
        } else {
            session()->setFlashdata('error', 'Sorry, the username or email you entered is not registered');
            return redirect()->to(base_url('/'))->withInput();
        }
    }

    public function signup()
    {
        $validate = $this->validate([
            'username' => 'required|trim|min_length[6]|is_unique[users.username]',
            'email' => 'required|trim|valid_email|is_unique[users.email]',
            'password' => 'required|trim|min_length[8]',
            'country' => 'required|trim',
            'confirm' => 'required|trim|min_length[8]|matches[password]',
        ]);

        if (!$validate) {
            return redirect()->to(base_url('/register'))->withInput();
        }

        $password = $this->request->getPost('password');
        $salt = base64_encode(random_bytes(16));
        $passwordHash = hash('sha256', $password.$salt);
        $email = $this->request->getPost('email');
        $this->UsersModel->insert([
            'username' =>  $this->request->getPost('username'),
            'email' =>  $email,
            'country_id' =>  $this->request->getPost('country'),
            'role' =>  'user',
            'password' => $passwordHash,
            'salt' => $salt,
            'is_active' => 0,
        ]);
        $token = base64_encode(random_bytes(16));
        $data_token = [
            'email' => $email,
            'token' => $token,
        ];
        $this->TokensModel->insert($data_token);
        $setemail = $this->EmailsModel->find(1);
        $this->Email->setFrom($setemail['from_email'], $setemail['from_name']);
        $this->Email->setTo($email);
        $this->Email->setSubject("Verify Account");
        $user = $this->UsersModel->checkUser($email);
        $data = [
            'email' => $email,
            'token' => $token,
            'user' => $user,
            'setting' => $this->SettingsModel->find(1),
        ];
        $message = view('email/verify', $data);
        $this->Email->setMessage($message);
        $this->Email->send();
        session()->setFlashdata('success', 'You have successfully registered, please check your email.');
        return redirect()->to(base_url('/login'));
    }

    public function logout()
    {
        session()->remove('id');
        session()->remove('role');
        session()->setFlashdata('success', 'You have successfully logged out');
        return redirect()->to(base_url('/'));
    }

    public function forgotpassword()
    {
        $data['title'] = "Forgot Password";
        $data['setting'] = $this->SettingsModel->find(1);
        return view('auth/forgotpassword', $data);
    }

    public function resetpassword()
    {
        $validate = $this->validate([
            'email' => 'required|trim|valid_email',
        ]);

        if (!$validate) {
            return redirect()->to(base_url('/forgotpassword'))->withInput();
        }

        $email = $this->request->getPost('email');
        $user = $this->UsersModel->checkUser($email);

        if ($user) {
            $token = base64_encode(random_bytes(16));
            $data_token = [
                'email' => $email,
                'token' => $token,
            ];
            $this->TokensModel->insert($data_token);
            $setemail = $this->EmailsModel->find(1);
            $this->Email->setFrom($setemail['from_email'], $setemail['from_name']);
            $this->Email->setTo($email);
            $this->Email->setSubject("Reset Password");
            $data = [
                'email' => $email,
                'token' => $token,
                'user' => $user,
                'setting' => $this->SettingsModel->find(1),
            ];
            $message = view('email/resetpassword', $data);
            $this->Email->setMessage($message);
            $this->Email->send();
            session()->setFlashdata('success', 'Please check your email for password reset');
            return redirect()->to(base_url('/'));
        } else {
            session()->setFlashdata('error', 'Sorry, the email you entered is not registered');
            return redirect()->to(base_url('/forgotpassword'))->withInput();
        }
    }

    public function reset()
    {
        $email = $this->request->getVar('email');
        $token = $this->request->getVar('token');
        $user = $this->UsersModel->checkUser($email);
        if ($user) {
            $cektoken = $this->TokensModel->checkToken($token);
            if ($cektoken) {
                $time_created = strtotime($cektoken['created_at']);
                $time_cek = $time_created + 86400;
                if (time() > $time_cek) {
                    $this->TokensModel->delete($cektoken['id']);
                    session()->setFlashdata('error', 'Password reset failed! Token expired.');
                    return redirect()->to(base_url('/'));
                }
                session()->set('reset', $email);
                $this->TokensModel->delete($cektoken['id']);
                session()->setFlashdata('success', 'Your account with email '.$email.' is eligible for password reset.');
                return redirect()->to(base_url('/changepassword'));
            } else {
                session()->setFlashdata('error', 'Password reset failed! Invalid token.');
                return redirect()->to(base_url('/'));
            }
        } else {
            session()->setFlashdata('error', 'Password reset failed! Invalid email.');
            return redirect()->to(base_url('/'));
        }
    }

    public function verif()
    {
        $email = $this->request->getVar('email');
        $token = $this->request->getVar('token');
        $user = $this->UsersModel->checkUser($email);
        if ($user) {
            $cektoken = $this->TokensModel->checkToken($token);
            if ($cektoken) {
                $this->UsersModel->update($user['id'], [
                    'is_active' => 1,
                ]);
                session()->set('reset', $email);
                $this->TokensModel->delete($cektoken['id']);
                session()->setFlashdata('success', 'Your account with email '.$email.' has been successfully verified.');
                return redirect()->to(base_url('/'));
            } else {
                session()->setFlashdata('error', 'Account verification failed! Invalid token.');
                return redirect()->to(base_url('/'));
            }
        } else {
            session()->setFlashdata('error', 'Account verification failed! Invalid email.');
            return redirect()->to(base_url('/'));
        }
    }

    public function changepassword()
    {
        if (!session()->get('reset')) {
            return redirect()->to(base_url('/'));
        }
        $email = session()->get('reset');
        $data = [
            'title' => 'Change Password',
            'email' => $email,
        ];
        $data['setting'] = $this->SettingsModel->find(1);
        return view('auth/changepassword', $data);
    }

    public function verify()
    {
        $validate = $this->validate([
            'password' => 'required|trim|min_length[8]',
            'confirm' => 'required|trim|min_length[8]|matches[password]',
        ]);
        if (!$validate) {
            return redirect()->to(base_url('/changepassword'))->withInput();
        }
        $password = $this->request->getPost('password');
        $email = $this->request->getPost('email');
        $salt = base64_encode(random_bytes(16));
        $passwordHash = hash('sha256', $password.$salt);
        $user = $this->UsersModel->checkUser($email);
        $this->UsersModel->update($user['id'], [
            'password' => $passwordHash,
            'salt' => $salt,
        ]);
        session()->remove('reset');
        session()->setFlashdata('success', 'Your password has been successfully changed.');
        return redirect()->to(base_url('/'));
    }

    public function contoh()
    {
        $user = $this->UsersModel->find(2);
        $data = [
            'transaction' => $this->TransactionsModel->getTrxById(2),
            'user' => $user,
            'setting' => $this->SettingsModel->find(1),
        ];
        return view('email/profit', $data);
    }

}