<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Plan extends BaseController
{
    public function index()
    {
        $data['title'] = "Staking Plan";
        $data['account'] = $this->UsersModel->find(session()->get('id'));
        $data['setting'] = $this->SettingsModel->find(1);
        $data['plan'] = $this->PlansModel->findAll();
        return view('admin/plan/view', $data);
    }
    
    public function create()
    {
        $data['title'] = "Staking Plan";
        $data['account'] = $this->UsersModel->find(session()->get('id'));
        $data['setting'] = $this->SettingsModel->find(1);
        return view('admin/plan/create', $data);
    }

    public function save()
    {
        $validate = $this->validate([
            'name' => 'required|trim|min_length[3]',
            'description' => 'required|trim',
            'period_month' => 'required|trim',
            'period_day' => 'required|trim',
            'min_amount' => 'required|trim',
            'max_amount' => 'required|trim',
            'return' => 'required|trim',
            'image' => 'uploaded[image]|max_size[image,1024]|is_image[image]|mime_in[image,image/jpeg,image/png,image/jpg]',
        ]);

        if (!$validate) {
            return redirect()->to(base_url('/admin/plan/create'))->withInput();
        }

        $image = $this->request->getFile('image');
        $newImageName = $image->getRandomName();
        $image->move('assets/images/plan/', $newImageName);
        $this->PlansModel->insert([
            'name' =>  $this->request->getPost('name'),
            'description' =>  $this->request->getPost('description'),
            'period_month' =>  $this->request->getPost('period_month'),
            'period_day' =>  $this->request->getPost('period_day'),
            'min_amount' =>  $this->request->getPost('min_amount'),
            'max_amount' =>  $this->request->getPost('max_amount'),
            'return' =>  $this->request->getPost('return'),
            'is_active' =>  $this->request->getPost('is_active'),
            'image' => $newImageName,
        ]);

        session()->setFlashdata('success', 'The staking plan has been added successfully.');
        return redirect()->to(base_url('/admin/plan'));
    }

    public function edit($id)
    {
        $data['title'] = "Staking Plan";
        $data['account'] = $this->UsersModel->find(session()->get('id'));
        $data['setting'] = $this->SettingsModel->find(1);
        $data['plan'] = $this->PlansModel->find($id);
        return view('admin/plan/edit', $data);
    }

    public function update($id)
    {
        $validate = $this->validate([
            'name' => 'required|trim|min_length[3]',
            'description' => 'required|trim',
            'period_month' => 'required|trim',
            'period_day' => 'required|trim',
            'min_amount' => 'required|trim',
            'max_amount' => 'required|trim',
            'return' => 'required|trim',
        ]);

        if (!$validate) {
            return redirect()->to(base_url('/admin/plan/edit/'.$id))->withInput();
        }

        $plan = $this->PlansModel->find($id);
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

            $oldimage = $plan['image'];
            if ($oldimage && file_exists('assets/images/plan/' . $oldimage)) {
                unlink('assets/images/plan/' . $oldimage);
            }
            $newName = $image->getRandomName();
            $image->move('assets/images/plan/', $newName);
            $newImageName = $newName;
        } else {
            $newImageName = $plan['image'];
        }

        $this->PlansModel->update($id, [
            'name' =>  $this->request->getPost('name'),
            'description' =>  $this->request->getPost('description'),
            'period_month' =>  $this->request->getPost('period_month'),
            'period_day' =>  $this->request->getPost('period_day'),
            'min_amount' =>  $this->request->getPost('min_amount'),
            'max_amount' =>  $this->request->getPost('max_amount'),
            'return' =>  $this->request->getPost('return'),
            'is_active' =>  $this->request->getPost('is_active'),
            'image' => $newImageName,
        ]);

        session()->setFlashdata('success', 'The staking plan has been updated successfully.');
        return redirect()->to(base_url('/admin/plan'));
    }


    public function delete($id)
    {
        $plan = $this->PlansModel->find($id);
        $image = $plan['image'];
        if ($image && file_exists('assets/images/plan/' . $image)) {
            unlink('assets/images/plan/' . $image);
        }
        $this->PlansModel->delete($id);
        session()->setFlashdata('success', 'The staking plan has been deleted successfully.');
        return redirect()->to(base_url('/admin/plan'));
    }
}