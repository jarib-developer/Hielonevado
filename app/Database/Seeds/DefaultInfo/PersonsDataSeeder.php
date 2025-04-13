<?php

namespace App\Database\Seeds\DefaultInfo;

use CodeIgniter\Database\Seeder;

class PersonsDataSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'identification' => '14701508',
            'idpersonsIdentificationType' => '1',
            'name' => 'Jarib',
            'lastname' => 'Acosta',
            'surname' => '',
            'surlastname' => '',
            'mail' => 'jarib.acosta@gmail.com',
            'phone' => '3006152172',
        ];
        $this->db->table('personsdata')->insert($data);
    }
}
