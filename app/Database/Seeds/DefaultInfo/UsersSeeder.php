<?php

namespace App\Database\Seeds\DefaultInfo;

use CodeIgniter\Database\Seeder;

class UsersSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'nickname' => 'jarib.acosta@gmail.com',
            'password' => '$2y$10$wkzX4mNGmJ.ORobsj06o/uY6h1wfrF82vR.1sn00Ko9UMaBJUONHO',
            'idUserProfiles' => '1',
            'idPersonsData' => '1',
        ];
        $this->db->table('users')->insert($data);
    }
}
