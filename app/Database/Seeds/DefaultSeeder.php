<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DefaultSeeder extends Seeder
{
    public function run()
    {
        $this->call('App\Database\Seeds\DefaultInfo\PersonsIdentificationTypeSeeder');
        $this->call('App\Database\Seeds\DefaultInfo\PersonsDataSeeder');
        $this->call('App\Database\Seeds\DefaultInfo\UserProfilesSeeder');
        $this->call('App\Database\Seeds\DefaultInfo\UsersSeeder');
    }
}
