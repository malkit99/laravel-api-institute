<?php

use App\Admin;
use App\Student;
use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class , 5)->create();
        factory(Admin::class , 2)->create();
        factory(Student::class , 2)->create();
    }
}
