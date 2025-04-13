<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class BlockedIPs extends Migration
{
    private $TbName = 'BlockedIPs';

    public function up()
    {
        $this->forge->addField([
            'id'       => [
                'type'           => 'INT',
                'auto_increment' => true,
            ],
            'ip_address' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'null'       => false,
            ],
            'time' => [
                'type'       => 'BIGINT',
                'null'       => false,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable($this->TbName);
    }

    public function down()
    {
        $this->forge->dropTable($this->TbName);
    }
}