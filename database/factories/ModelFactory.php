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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    $time = \Carbon\Carbon::now();

    return [
        'name'           => $faker->name,
        'email'          => $faker->safeEmail,
        'password'       => bcrypt(str_random(10)),
        'phone'          => $faker->phoneNumber,
        'company'        => $faker->company . ' ' . $faker->companySuffix,
        'remember_token' => str_random(10),
        'created_at'     => $time->subDays($faker->randomDigitNotNull),
    ];
});

$factory->define(\App\File::class, function (Faker\Generator $faker) {
    $time = \Carbon\Carbon::now();

    return [
        'name'        => $faker->slug . $faker->fileExtension,
        'description' => $faker->realText(1000),
        'url'         => '/app/files/file.pdf',
        'created_at'  => $time->subDays($faker->randomDigitNotNull),
    ];
});
$factory->define(\App\Download::class, function (Faker\Generator $faker) {
    $time = \Carbon\Carbon::now();

    return [
        'user_id'    => $faker->randomDigitNotNull,
        'file_id'    => $faker->randomDigitNotNull,
        'ref'        => strtoupper(str_random(8)),
        'created_at' => $time->subDays($faker->randomDigitNotNull),
    ];
});
