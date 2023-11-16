<?php

namespace App\Database\Seeds;

use App\Models\TeacherModel;
use App\Models\ClassroomModel;
use App\Models\SubjectModel;
use App\Models\UserModel;
use CodeIgniter\Database\Seeder;

class TeacherSeeder extends Seeder
{    
    protected $teacherModel, $classroomModel, $subjectModel, $userModel;

    public function __construct()
    {
        $this->teacherModel     = new TeacherModel();
        $this->classroomModel   = new ClassroomModel();
        $this->subjectModel     = new SubjectModel();
        $this->userModel        = new UserModel();
    }

    /**
     * Run Seeder
     *
     * @return void
     */
    public function run()
    {
        $classrooms = $this->classroomModel->findAll();
        $subjects   = $this->subjectModel->findAll();

        $user = $this->userModel->insert([
            'first_name' => 'Gadis',
            'last_name' => 'Tapana Bela',
            'id_number' => 10220072,
            'email' => "gadiscantik@mail.com",
            'gender' => 'perempuan',
            'religion' => 'islam',
            'picture' => 'picture.png',
            'role' => 'teacher',
            'password' => password_hash('10220072', PASSWORD_BCRYPT),
        ]);

        $teacher = $this->teacherModel->insert([
            'user_id' => $user,
            'code' => 'GTB'
        ]);

        $subjectIds = [];
        $classroomIds = [];

        // Ambil dua mata pelajaran secara acak
        $randomSubjects = array_rand($subjects, 2);
        foreach ($randomSubjects as $subjectIndex) {
            $subject = $subjects[$subjectIndex];
            $subjectIds[] = $subject->id;
        }

        // Ambil satu ruang kelas secara acak
        $randomClassroom = array_rand($classrooms, 1);
        $classroom = $classrooms[$randomClassroom];
        $classroomIds[] = $classroom->id;

        $this->teacherModel->syncSubjects($teacher, $subjectIds);
        $this->teacherModel->syncClassrooms($teacher, $classroomIds);
    }
}
