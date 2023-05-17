<?php

namespace App\Models;

use CodeIgniter\Model;

class EmailsModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'emails';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'from_email',
        'from_name',
        'recipients',
        'user_agent',
        'protocol',
        'mail_path',
        'smtp_host',
        'smtp_user',
        'smtp_pass',
        'smtp_port',
        'smtp_timeout',
        'smtp_keep_alive',
        'smtp_crypto',
        'word_wrap',
        'wrap_chars',
        'mail_type',
        'charset',
        'validate',
        'priority',
        'crlf',
        'newline',
        'bcc_batch_mode',
        'bcc_batch_size',
        'dsn',
    ];

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
}
