<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Plans extends Migration
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
            'period_day' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'period_month' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'min_amount' => [
                'type' => 'FLOAT',
                'constraint' => '10,2',
            ],
            'max_amount' => [
                'type' => 'FLOAT',
                'constraint' => '10,2',
            ],
            'return' => [
                'type' => 'FLOAT',
                'constraint' => '10,2',
            ],
            'estimation' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'image' => [
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
        $this->forge->createTable('plans');
        $data = [
            ['id' => '1','name' => 'Standart Plan','description' => 'Make Your Profit','period_day' => '90','period_month' => '3','min_amount' => '0.00','max_amount' => '100000.00','return' => '15.00','estimation' => '2% - 3% / Mount','image' => '1684147705_a4721ff3f722b8a1fc78.png','is_active' => '1','created_at' => '2023-05-15 17:48:25','updated_at' => '2023-05-15 17:48:25'],
            ['id' => '2','name' => 'Medium Plan','description' => 'Make Your Profit','period_day' => '180','period_month' => '6','min_amount' => '0.00','max_amount' => '10000.00','return' => '20.00','estimation' => '4% - 5% / Mounth','image' => '1684147780_18449375c9a24b9d84e9.png','is_active' => '1','created_at' => '2023-05-15 17:49:40','updated_at' => '2023-05-15 17:49:40'],
            ['id' => '3','name' => 'Best Plan','description' => 'Make Your Profit','period_day' => '360','period_month' => '12','min_amount' => '0.00','max_amount' => '100000.00','return' => '25.00','estimation' => '5% - 6% / Mount','image' => '1684147851_0317a26be542d5578605.png','is_active' => '1','created_at' => '2023-05-15 17:50:51','updated_at' => '2023-05-15 17:50:51']
        ];
        $this->db->table('plans')->insertBatch($data);
    }

    public function down()
    {
        $this->forge->dropTable('plans');
    }
}