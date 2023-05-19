<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Transactions extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'user_id' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'plan_id' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'no_transaction' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'amount' => [
                'type' => 'FLOAT',
                'constraint' => '10,2',
            ],
            'persentace' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'profit' => [
                'type' => 'FLOAT',
                'constraint' => '10,2',
            ],
            'is_active' => [
                'type' => 'BOOLEAN',
                'default' => true,
            ],
            'date' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('transactions');
    }

    public function down()
    {
        $this->forge->dropTable('transactions');
    }
}