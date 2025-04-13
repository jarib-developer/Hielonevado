<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PersonsData extends Migration
{
    private $TbName = 'PersonsData';
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
        'surname' => [
                'type'       => 'VARCHAR',
                'constraint' => 40,
                'null'       => true,
            ],
        'lastname' => [
                'type'       => 'VARCHAR',
                'constraint' => 40,
                'null'       => false,
            ],
        'surlastname' => [
                'type'       => 'VARCHAR',
                'constraint' => 40,
                'null'       => true,
            ],
        'mail' => [
                'type'       => 'VARCHAR',
                'constraint' => 60,
                'null'       => true,
            ],
        'phone' => [
                'type'       => 'VARCHAR',
                'constraint' => 40,
                'null'       => true,
            ],
        'identification' => [
                'type'       => 'VARCHAR',
                'constraint' => 40,
                'null'       => false,
            ],
        'idpersonsIdentificationType' => [
                'type'       => 'INT',
                'null'       => false,
            ],
        'idavatars' => [
                'type'       => 'INT',
                'null'       => true,
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'updated_at DATETIME DEFAULT CURRENT_TIMESTAMP',
        ]);
        $this->forge->addKey('id', true);
        //RelationShip
        $this->forge->addForeignKey('idpersonsIdentificationType', 'PersonsIdentificationType', 'id');
        $this->forge->addForeignKey('idavatars', 'avatars', 'id');
        $this->forge->createTable($this->TbName);
    }

    public function down()
    {
        $this->forge->dropTable($this->TbName);
    }
}
