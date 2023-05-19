<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use PhpOffice\PhpSpreadsheet\IOFactory;

class Whitelist extends BaseController
{
    public function index()
    {
        $data['title'] = "Whitelist";
        $data['account'] = $this->UsersModel->find(session()->get('id'));
        $data['setting'] = $this->SettingsModel->find(1);
        $data['whitelist'] = $this->UsersModel->getWhiteList();
        return view('admin/whitelist/view', $data);
    }

    public function import()
    {
        $file = $this->request->getFile('file');
        if ($file->isValid() && !$file->hasMoved()) {
            $fileName = $file->getRandomName();
            $filePath = 'assets/import/' . $fileName;
            $file->move('assets/import/', $fileName);
    
            $spreadsheet = IOFactory::load($filePath);
            $worksheet = $spreadsheet->getActiveSheet();
    
            $data = [];
    
            foreach ($worksheet->getRowIterator() as $row) {
                $cellIterator = $row->getCellIterator();
                $cellIterator->setIterateOnlyExistingCells(false);
    
                $rowData = [];
                foreach ($cellIterator as $cell) {
                    $rowData[] = $cell->getValue();
                }
    
                if (!empty($rowData)) {
                    $data[] = [
                        'wallet_address' => trim($rowData[0])
                    ];
                }
            }
    
            if (!empty($data)) {
                $existingAddresses = $this->WhitelistsModel->select('wallet_address')->findAll();
                $existingAddresses = array_column($existingAddresses, 'wallet_address');
                $data = array_filter($data, function ($item) use ($existingAddresses) {
                    return !in_array($item['wallet_address'], $existingAddresses);
                });
                $this->WhitelistsModel->truncate();
                $inserted = $this->WhitelistsModel->insertBatch($data);
    
                if ($inserted) {
                    session()->setFlashdata('success', 'Import successful!');
                } else {
                    session()->setFlashdata('error', 'Failed to insert data into the database!');
                }
            } else {
                session()->setFlashdata('error', 'Empty data! No records to import.');
            }
    
            return redirect()->to(base_url('/admin/whitelist'));
        }
    
        session()->setFlashdata('error', 'Invalid file format!');
        return redirect()->to(base_url('/admin/whitelist'));
    }
    
    
    public function edit($id)
    {
        $data['title'] = "Whitelist";
        $data['account'] = $this->UsersModel->find(session()->get('id'));
        $data['setting'] = $this->SettingsModel->find(1);
        $data['user'] = $this->UsersModel->find($id);
        $data['wallet'] = $this->WalletsModel->getWallet($id);
        return view('admin/whitelist/edit', $data);
    }

    public function update($id)
    {
        $is_plan = $this->request->getPost('is_plan');
        if($is_plan == null){
            session()->setFlashdata('error', 'Sorry, you did not click on Active for your investment plan.');
            return redirect()->to(base_url('/admin/whitelist'));
        } else {
            $this->UsersModel->update($id, [
                'is_plan' => $is_plan
            ]);
            session()->setFlashdata('success', 'Your investment plan is now accessible.');
            return redirect()->to(base_url('/admin/whitelist'));
        }
    }
}