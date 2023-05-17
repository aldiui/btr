<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['name','username','email','password','salt','gender','date_of_birth','place_of_birth','role','image','address','main_wallet','is_active','is_plan','country_id'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function checkUser($email)
    {
        return $this->where('email', $email)->orWhere('username', $email)->first();
    }

    public function getUser()
    {
        return $this->where('role', 'user')->orderBy('id', 'DESC')->findAll();
    }

    public function getWhiteList()
    {
        return $this->select('users.*, COUNT(DISTINCT wallets.id) as total_wallets')
            ->join('wallets', 'wallets.user_id = users.id', 'left')
            ->groupBy('users.id')
            ->having('total_wallets >=', 1)
            ->orderBy('users.id', 'DESC')
            ->findAll();
    }
}