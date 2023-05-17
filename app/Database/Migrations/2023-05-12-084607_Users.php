<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
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
            'username' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'salt' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'gender' => [
                'type' => 'ENUM',
                'constraint' => ['male', 'female', 'other'],
                'null' => true,
            ],
            'date_of_birth' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'place_of_birth' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'role' => [
                'type' => 'ENUM',
                'constraint' => ['admin', 'user'],
                'default' => 'user',
            ],
            'image' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'default' => 'default.jpg',
            ],
            'country_id' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'address' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'main_wallet' => [
                'type' => 'FLOAT',
                'constraint' => '10,2',
                'default' => 0,
            ],
            'is_active' => [
                'type' => 'BOOLEAN',
            ],
            'is_plan' => [
                'type' => 'BOOLEAN',
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
        $this->forge->createTable('users');

        $data = [
            ['id' => '1','name' => 'admin','username' => 'admin1','email' => 'aldijaya280902@gmail.com','password' => '2e92ae3c720b53037769fd493cd6f04beeaaece756a676e2470c43aae0968c10','salt' => 'HUKDOwkh6HEODqkymaUCFg==','gender' => NULL,'date_of_birth' => NULL,'place_of_birth' => NULL,'role' => 'admin','image' => 'default.jpg','country_id' => '104','address' => NULL,'main_wallet' => '0.00','is_active' => '1','is_plan' => '1','created_at' => '2023-05-13 18:35:27','updated_at' => '2023-05-13 18:35:27'],
            ['id' => '2','name' => 'user','username' => 'userman1','email' => 'aldikakabow28@gmail.com','password' => '7de50fae77d8b308fe333e1f6024bac11ea591ed237c06a3b04210ff354867e5','salt' => 'R5R3s2/yp1iU/ox0JVdyxA==','gender' => NULL,'date_of_birth' => NULL,'place_of_birth' => NULL,'role' => 'user','image' => 'default.jpg','country_id' => '104','address' => NULL,'main_wallet' => '0.00','is_active' => '1', 'is_plan' => '0','created_at' => '2023-05-15 17:58:05','updated_at' => '2023-05-15 17:59:46']
        ];
        $this->db->table('users')->insertBatch($data);
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}