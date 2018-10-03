<?php

use App\Level;
use App\Course;
use App\Teacher;
use App\Category;
use Faker\Generator as Faker;

$factory->define(App\Course::class, function (Faker $faker) {
    $name=$faker->sentence;
    $status=$faker->randomElement([Course::PUBLISHED,Course::REJECTED,Course::PENDING]);
    return [
        'name'=>$name,
        'status'=>$status,
        'teacher_id'=>Teacher::all()->random()->id,
        'category_id'=>Category::all()->random()->id,
        'level_id'=>Level::all()->random()->id,
        'slug'=>str_slug($name,'-'),
        'description'=>$faker->paragraph,
        'picture'=>\Faker\Provider\Image::image(storage_path().'/app/public/courses',600,350,'business',false),
        'previous_approved'=>$status!==Course::PUBLISHED?false:true,
        'previous_rejected'=>$status!==Course::REJECTED?true:false,
    ];
});
