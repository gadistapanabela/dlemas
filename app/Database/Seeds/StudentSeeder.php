<?php

namespace App\Database\Seeds;

use App\Models\StudentModel;
use App\Models\ClassroomModel;
use App\Models\UserModel;
use CodeIgniter\Database\Seeder;

class StudentSeeder extends Seeder
{
    protected $studentModel, $classroomModel, $userModel; 
        
    /**
     * Constructor.
     *
     * @return void
     */
    public function __construct()
    {
        $this->studentModel     = new StudentModel();
        $this->classroomModel   = new ClassroomModel();
        $this->userModel        = new UserModel();
    }
    
    /**
     * run Seeder
     *
     * @return void
     */
    public function run()
    {
        $classrooms = $this->classroomModel->findAll();
        $classroomId = null;

        $randomClassroom = array_rand($classrooms, 1);
        $classroomId = $classrooms[$randomClassroom]->id;

        $user = $this->userModel->insert([
            'first_name' => 'Kim',
            'last_name' => 'Seokjin',
            'id_number' => 11223344,
            'email' => "kimseokjin@mail.com",
            'gender' => 'laki_laki',
            'religion' => 'islam',
            'picture' => 'picture.png',
            'role' => 'student',
            'password' => password_hash('11223344', PASSWORD_BCRYPT),
        ]);

        $this->userModel->insertStudent([
            'user_id'      => $user,
            'classroom_id' => $classroomId,
        ]);
    }
}
