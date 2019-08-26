<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'role_id' => $faker->numberBetween(1, 3),
        'is_active' => 1,
        'photo_id' => 1,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Post::class, function (Faker\Generator $faker) {

    return [
        'user_id' => $faker->numberBetween(1, 10), 
        'category_id' => $faker->numberBetween(1,4), 
        'photo_id' => 1, 
        'title' => $faker->sentence(7,11), 
        'body' => $faker->paragraph(rand(10,15), true),
        'slug' => $faker->slug(),
    ];
});

$factory->define(App\Role::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->randomElement(['administrator', 'author', 'subscriber']), 
    ];
});

$factory->define(App\Category::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->randomElement(['PHP', 'Laravel', 'JavaScript', 'Bootstrap']), 
    ];
});

$factory->define(App\Photo::class, function (Faker\Generator $faker) {

    return [
        'file' => 'placeholder.jpg', 
    ];
});

$factory->define(App\Comment::class, function (Faker\Generator $faker) {

    return [
        'post_id' => $faker->numberBetween(1, 10),
        'is_active' => 1,
        'author' => $faker->name,
        'photo' => 'placeholder.jpg',
        'email' => $faker->unique()->safeEmail,
        'body' => $faker->paragraph(1, true),
    ];
});

$factory->define(App\CommentReply::class, function (Faker\Generator $faker) {

    return [
        'comment_id' => $faker->numberBetween(1, 10),
        'is_active' => 1,
        'author' => $faker->name,
        'photo' => 'placeholder.jpg',
        'email' => $faker->unique()->safeEmail,
        'body' => $faker->paragraph(1, true),
    ];
});