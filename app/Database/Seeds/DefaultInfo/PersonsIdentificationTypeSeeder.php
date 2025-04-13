<?php

namespace App\Database\Seeds\DefaultInfo;

use CodeIgniter\Database\Seeder;

class PersonsIdentificationTypeSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'abb'         => 'C.C.',
                'description' => 'Documento de identificación para ciudadanos colombianos mayores de edad.',
                'name'        => 'Cédula de Ciudadanía',
                'state'       => 1
            ],
            [
                'abb'         => 'T.I.',
                'description' => 'Documento para menores de edad colombianos.',
                'name'        => 'Tarjeta de Identidad',
                'state'       => 1
            ],
            [
                'abb'         => 'R.C.',
                'description' => 'Documento de identidad para recién nacidos en Colombia.',
                'name'        => 'Registro Civil',
                'state'       => 1
            ],
            [
                'abb'         => 'C.E.',
                'description' => 'Documento para extranjeros residentes en Colombia.',
                'name'        => 'Cédula de Extranjería',
                'state'       => 1
            ],
            [
                'abb'         => 'PAS.',
                'description' => 'Documento de identificación internacional.',
                'name'        => 'Pasaporte',
                'state'       => 1
            ],
            [
                'abb'         => 'NIT.',
                'description' => 'Documento de identificación tributaria para personas naturales o jurídicas.',
                'name'        => 'Número de Identificación Tributaria',
                'state'       => 1
            ],
            [
                'abb'         => 'PPT',
                'description' => 'Documento emitido a migrantes venezolanos en el marco del Estatuto Temporal de Protección.',
                'name'        => 'Permiso por Protección Temporal',
                'state'       => 1
            ]
        ];

        $this->db->table('personsidentificationtype')->insertBatch($data);
    }
}
