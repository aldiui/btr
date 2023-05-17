<?php

namespace App\Models;

use CodeIgniter\Model;

class WithdrawsModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'withdraws';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['user_id', 'wallet_id', 'no_transaction', 'amount', 'account', 'is_active'];

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
        return $this->select('withdraws.*, wallets.name as wallet, methods.name as method, users.name as user, users.username, users.email')
            ->join('wallets', 'withdraws.wallet_id = wallets.id')
            ->join('users', 'withdraws.user_id = users.id')
            ->join('methods', 'wallets.method_id = methods.id')
            ->orderBy('withdraws.id', 'DESC')
            ->findAll();
    }

    public function getTrx($id)
    {
        return $this->select('withdraws.*, wallets.name as wallet, methods.name as method, users.name as user, users.username, users.email')
            ->join('wallets', 'withdraws.wallet_id = wallets.id')
            ->join('users', 'withdraws.user_id = users.id')
            ->join('methods', 'wallets.method_id = methods.id')
            ->where('withdraws.user_id', $id)
            ->orderBy('withdraws.id', 'DESC')
            ->findAll();
    }

    public function getTrxById($id)
    {
        return $this->select('withdraws.*, wallets.name as wallet, methods.name as method, users.name as user, users.username, users.email')
            ->join('wallets', 'withdraws.wallet_id = wallets.id')
            ->join('users', 'withdraws.user_id = users.id')
            ->join('methods', 'wallets.method_id = methods.id')
            ->where('withdraws.id', $id)
            ->orderBy('withdraws.id', 'DESC')
            ->first();
    }

}