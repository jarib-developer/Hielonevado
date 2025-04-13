<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
    private $TbName = 'Users';
    public function up()
    {
        $this->forge->addField([
            'id'  => [
                    'type'           => 'INT',
                    'unique'=> TRUE,
                    'auto_increment' => true,
                ],
            'nickname' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 40,
                    'null'       => false,
                ],
            'password' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 65,
                    'null'       => false,
                ],
            'state' => [
                'type'       => 'tinyint',
                'default'   => 1,
                'constraint' => 1,
                'null'       => false,
            ],
            'sckey' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 60,
                    'null'       => true,
                ],
            'lastlog' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 40,
                    'null'       => false,
                ],
            'idUserProfiles' => [
                    'type'       => 'INT',
                    'null'       => false,
                ],
            'idPersonsData' => [
                    'type'       => 'INT',
                    'null'       => false,
                ],
                'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
                'updated_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            ]);
            $this->forge->addKey('id', true);
            //RelationShip
            $this->forge->addForeignKey('idUserProfiles', 'UserProfiles', 'id');
            $this->forge->addForeignKey('idPersonsData', 'PersonsData', 'id');
            $this->forge->createTable($this->TbName);
    }

    public function down()
    {
        $this->forge->dropTable($this->TbName);
    }
}
