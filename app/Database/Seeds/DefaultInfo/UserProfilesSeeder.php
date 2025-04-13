<?php

namespace App\Database\Seeds\DefaultInfo;

use CodeIgniter\Database\Seeder;

class UserProfilesSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'name' => 'Admin',
            'description' => 'Administrador',
        ];
        $this->db->table('userprofiles')->insert($data);
    }
}
