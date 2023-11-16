<?php

namespace App\Database\Seeds;

use App\Models\SubjectModel;
use CodeIgniter\Database\Seeder;

class SubjectSeeder extends Seeder
{
    public function run()
    {
        $subjects = new SubjectModel();

        $subjects->insertBatch([
            [
                'name' => 'X - Pendidikan Agama Islam',
                'code' => 'x-pai'
            ],
            [
                'name' => 'X - Bahasa Inggris',
                'code' => 'x-bing'
            ],
            [
                'name' => 'X - Matematika',
                'code' => 'x-mtk'
            ]
        ]);
    }
}
