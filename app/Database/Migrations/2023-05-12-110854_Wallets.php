<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Wallets extends Migration
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
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'wallet_address' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
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
        $this->forge->createTable('wallets');
        $data = [
            ['id' => '1','user_id' => '2','method_id' => '1','name' => 'BUSD','wallet_address' => '119jjisdfio0fidsjfosif0sdifdskfdsofpjdspofj','created_at' => '2023-05-15 18:00:36','updated_at' => '2023-05-15 18:00:36']
        ];
        $this->db->table('wallets')->insertBatch($data);
    }

    public function down()
    {
        $this->forge->dropTable('wallets');
    }
}