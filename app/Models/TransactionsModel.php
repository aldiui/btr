<?php

namespace App\Models;

use CodeIgniter\Model;

class TransactionsModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'transactions';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['user_id', 'plan_id', 'method_id', 'no_transaction', 'amount', 'persentace', 'profit', 'is_active','date'];

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
        return $this->select('transactions.*, deposits.*, transactions.id as id_trx, deposits.id as id_dp, methods.name as method, plans.name as plan, plans.period_month as month, plans.period_day as day, users.name as user, users.username, users.email, transactions.is_active as active')
            ->join('methods', 'transactions.method_id = methods.id')
            ->join('plans', 'transactions.plan_id = plans.id')
            ->join('users', 'transactions.user_id = users.id')
            ->join('deposits', 'transactions.no_transaction =deposits.no_transaction')
            ->orderBy('transactions.id', 'DESC')
            ->findAll();
    }

    public function getTrx($id)
    {
        return $this->select('transactions.*, deposits.*, transactions.id as id_trx, deposits.id as id_dp, methods.name as method, plans.name as plan, plans.period_month as month, plans.period_day as day, users.name as user, users.username, users.email, transactions.is_active as active')
        ->join('methods', 'transactions.method_id = methods.id')
        ->join('plans', 'transactions.plan_id = plans.id')
        ->join('users', 'transactions.user_id = users.id')
        ->join('deposits', 'transactions.no_transaction =deposits.no_transaction')
        ->where('transactions.user_id', $id)
        ->orderBy('transactions.id', 'DESC')
        ->findAll();
    }

    public function getTrxById($id)
    {
        return $this->select('transactions.*, deposits.*, transactions.id as id_trx, deposits.id as id_dp, methods.name as method, plans.name as plan, plans.period_month as month, plans.period_day as day, users.name as user, users.username, users.email, transactions.is_active as active')
        ->join('methods', 'transactions.method_id = methods.id')
        ->join('plans', 'transactions.plan_id = plans.id')
        ->join('users', 'transactions.user_id = users.id')
        ->join('deposits', 'transactions.no_transaction =deposits.no_transaction')
        ->where('transactions.id', $id)
        ->first();
    }
}