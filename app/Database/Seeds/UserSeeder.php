<?php

namespace App\Database\Seeds;

use App\Models\UserModel;
use CodeIgniter\Database\Seeder;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'first_name' => 'Filah',
                'last_name' => 'Fadilah',
                'id_number' => 10220040,
                'email' => "filahfadilah@mail.com",
                'gender' => 'laki_laki',
                'religion' => 'islam',
                'picture' => 'picture.png',
                'role' => 'admin',
                'password' => password_hash('10220040', PASSWORD_BCRYPT),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ];

        $userModel = new UserModel();
        $userModel->insertBatch($data);
    }
}
