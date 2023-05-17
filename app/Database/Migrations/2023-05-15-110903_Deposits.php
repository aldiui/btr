<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Deposits extends Migration
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
            'method_id' => [
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
            'hash' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'image' => [
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
        $this->forge->createTable('deposits');
    }

    public function down()
    {
        $this->forge->dropTable('deposits');
    }
}