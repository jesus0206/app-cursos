<?php

use Faker\Generator as Faker;

$factory->define(App\User::class, function (Faker $faker) {
    $name=$faker->name;
    $last_name=$faker->lastName;
    return [
        'name' => $name,
        'last_name'=>$last_name,
        'slug'=>str_slug($name." ".$last_name,'-'),
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
        'picture'=>\Faker\Provider\Image::image(storage_path().'/app/public/users',200,200,'people',false),
    ];
});
