<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faithgen\Miscellaneous\Models\Contact;
use Faker\Generator as Faker;

$factory->define(Contact::class, function (Faker $faker) {
    return [
        'first_name'=>$faker->firstName,
        'last_name'=>$faker->lastName,
        'email' => $faker->safeEmail,
        'query' => $faker->sentence(50)
    ];
});
