<?php

use Faker\Generator as Faker;

$factory->define(App\Category::class, function (Faker $faker) {
    return [
        'name'=>$faker->randomElement(['PHP','JAVASCRIPT','JAVA','DISENO WEB','SERVIDORES','MYSQL','NOSQL','BIGDATA','AMAZON WEB SERVICES']),
        'description'=> $faker->sentence
    ];
});
