<?php

use App\Goal;
use App\Role;
use App\User;
use App\Level;
use App\Course;
use App\Student;
use App\Teacher;
use App\Category;
use App\Requirement;
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
        Storage::deleteDirectory('courses');
        Storage::deleteDirectory('users');

        Storage::makeDirectory('courses');
        Storage::makeDirectory('users');

        factory(Role::class,1)->create(['name'=>'admin']);
        factory(Role::class,1)->create(['name'=>'student']);
        factory(Role::class,1)->create(['name'=>'teacher']);

        factory(User::class,1)->create([
            'name'=>'admin',
            'email'=>'jesus.tn79@gmail.com',
            'password'=>bcrypt('secret'),
            'role_id'=>Role::ADMIN,
        ])->each(function(User $u){
            factory(Student::class,1)->create(['user_id'=>$u->id]);
        });

        // factory(User::class,50)->create()
        // ->each(function(User $u){
        //     factory(Student::class,1)->create(['user_id'=>$u->id]);
        // });

        // factory(User::class,50)->create()
        // ->each(function(User $u){
        //     factory(Teacher::class,1)->create(['user_id'=>$u->id]);
        // });

        factory(User::class,10)->create()
        ->each(function(User $u){
            factory(Teacher::class,1)->create(['user_id'=>$u->id]);
            factory(Student::class,1)->create(['user_id'=>$u->id]);
        });

        factory(Level::class,1)->create(['name'=>'Beginner']);
        factory(Level::class,1)->create(['name'=>'Intermediate']);
        factory(Level::class,1)->create(['name'=>'Advanced']);
        factory(Category::class,5)->create();

        factory(Course::class,50)
        ->create()
        ->each(function(Course $c){
            $c->goals()->saveMany(factory(Goal::class,2)->create());
            $c->requirements()->saveMany(factory(Requirement::class,4)->create());
        });

    }
}
