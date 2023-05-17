<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Withdraws extends Migration
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
            'wallet_id' => [
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
            'account' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'is_active' => [
                'type' => 'BOOLEAN',
                'default' => true,
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
        $this->forge->createTable('withdraws');
    }

    public function down()
    {
        $this->forge->dropTable('withdraws');
    }
}