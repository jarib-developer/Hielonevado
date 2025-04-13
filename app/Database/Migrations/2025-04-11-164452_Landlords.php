<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Landlords extends Migration
{
    private $TbName = 'Landlords';

    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'unique' => TRUE,
                'auto_increment' => true,
            ],
            'idPersonsData' => [
                'type' => 'INT',
                'null'       => false,
            ],
            'state' => [
                'type' => 'tinyint',
                'default' => 1,
                'constraint' => 1,
                'null' => false,
            ],
            'receiptsCounter' => [
                'type' => 'INT',
                'default' => 10,
                'null' => false,
            ],
            'recordsCounter' => [
                'type' => 'INT',
                'default' => 10,
                'null' => false,
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'updated_at DATETIME DEFAULT CURRENT_TIMESTAMP',
        ]);
        $this->forge->addKey('id', true);
        // RelationShip
        $this->forge->addForeignKey('idPersonsData', 'PersonsData', 'id');
        $this->forge->createTable($this->TbName);
    }

    public function down()
    {
        $this->forge->dropTable($this->TbName);
    }
}
