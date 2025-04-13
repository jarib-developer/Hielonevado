<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Avatars extends Migration
{
    private $TbName = 'avatars';
    public function up()
    {
        $this->forge->addField([
            'id'  => [
                    'type'           => 'INT',
                    'unique'=> TRUE,
                    'auto_increment' => true,
                ],
            'filename' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 60,
                    'null'       => false,
                ],
            'file_ext' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 6,
                    'null'       => false,
                ],
            'file_src' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 400,
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
