<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Settings extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'description' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'short' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'image' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
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
        $this->forge->createTable('settings');
        $data = [
            [
            'id' => '1',
            'name' => 'BTR PrivateSale',
            'description' => 'Make Your Profit BTR PrivateSale',
            'short' => 'BTR',
            'image' => 'logo.png',
            'created_at' => '2023-05-13 18:35:27',
            'updated_at' => '2023-05-13 18:35:27'
            ]
        ];
        $this->db->table('settings')->insertBatch($data);
    }

    public function down()
    {
        $this->forge->dropTable('settings');
    }
}