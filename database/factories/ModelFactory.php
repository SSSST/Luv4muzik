<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Models\User::class, function (Faker $faker) {
    $date = $faker->date . $faker->time;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => bcrypt('secret'), // secret
        'brief' => $faker->sentence,
        'remember_token' => str_random(10),
        'created_at' => $date,
        'updated_at' => $date,
    ];
});

$factory->define(App\Models\Musician::class, function (Faker $faker) {
    $date = $faker->date . $faker->time;

    return [
        'user_id' => function() {
            return factory('App\Models\User')->create(['is_musician' => 1])->id;
        },
        'name' => $faker->name,
        'brief' => $faker->sentence,
        'created_at' => $date,
        'updated_at' => $date,
    ];
});

$factory->define(App\Models\Song::class, function (Faker $faker) {
    $date = $faker->date . $faker->time;

    return [
        'musician_id' => function() {
            return factory('App\Models\musician')->create()->id;
        },
        'name' => $faker->name,
        'brief' => $faker->sentence,
        'lyric' => $faker->text,
        'created_at' => $date,
        'updated_at' => $date,
    ];
});

$factory->define(App\Models\RecommendSong::class, function (Faker $faker) {
    $date = $faker->date . $faker->time;

    return [
        'user_id' => function() {
            return factory('App\Models\User')->create()->id;
        },
        'title' => $faker->title,
        'brief' => $faker->sentence,
        'body' => $faker->text,
        'created_at' => $date,
        'updated_at' => $date,
    ];
});
