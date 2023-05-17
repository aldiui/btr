<?php

namespace App\Models;

use CodeIgniter\Model;

class DepositsModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'deposits';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['user_id', 'transactions_id', 'method_id', 'no_transaction', 'amount', 'hash', 'image', 'is_active'];

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

    public function getAll()
    {
        return $this->select('deposits.*, methods.name as method, users.name as user, users.username, users.email')
            ->join('methods', 'deposits.method_id = methods.id')
            ->join('users', 'deposits.user_id = users.id')
            ->orderBy('deposits.id', 'DESC')
            ->findAll();
    }

    public function getTrx($id)
    {
        return $this->select('deposits.*, methods.name as method, users.name as user, users.username, users.email')
            ->join('methods', 'deposits.method_id = methods.id')
            ->join('users', 'deposits.user_id = users.id')
            ->where('deposits.user_id', $id)
            ->orderBy('deposits.id', 'DESC')
            ->findAll();
    }

    public function getTrxById($id)
    {
        return $this->select('deposits.*, methods.name as method, users.name as user, users.username, users.email')
            ->join('methods', 'deposits.method_id = methods.id')
            ->join('users', 'deposits.user_id = users.id')
            ->where('deposits.id', $id)
            ->first();
    }
}