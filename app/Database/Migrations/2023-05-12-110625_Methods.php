<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Methods extends Migration
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
            'network' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'image' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'wallet_address' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'wallet_image' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
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
        $this->forge->createTable('methods');
        $data = [
            ['id'=> '1','name' => 'BUSD','network' => 'BEP20','image' => '1684147623_276dbd3b0d14cc3f771d.png','wallet_address' => 'w7e892huhdiwh109rdreude9udihefeuw90ruew09ru9','wallet_image' => '1684147623_7f729a0f119a01f7fc11.png','is_active' => '1','created_at' => '2023-05-15 17:47:03','updated_at' => '2023-05-15 17:47:03']
        ];
        $this->db->table('methods')->insertBatch($data);
    }

    public function down()
    {
        $this->forge->dropTable('methods');
    }
}