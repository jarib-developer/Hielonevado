<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UserProfiles extends Migration
{
    private $TbName = 'UserProfiles';
    public function up()
    {
        $this->forge->addField([
            'id'  => [
                    'type'           => 'INT',
                    'unique'=> TRUE,
                    'auto_increment' => true,
                ],
            'name' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 40,
                    'null'       => false,
                ],
            'description' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 200,
                    'null'       => false,
                ],
            'state' => [
                'type'       => 'tinyint',
                'default'   => 1,
                'constraint' => 1,
                'null'       => false,
            ],
                'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
                'updated_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            ]);
            $this->forge->addKey('id', true);
            $this->forge->createTable($this->TbName);
    }

    public function down()
    {
        $this->forge->dropTable($this->TbName);
    }
}
