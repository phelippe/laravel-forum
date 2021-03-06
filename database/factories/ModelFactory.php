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
$factory->define(Forum\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(Forum\Thread::class, function($faker){
	return [
		'user_id' => function(){
			return factory('Forum\User')->create()->id;
		},
		'title' => $faker->sentence,
		'body' => $faker->paragraph,
	];
});

$factory->define(Forum\Reply::class, function($faker){
	return [
		'user_id' => function(){
			return factory('Forum\User')->create()->id;
		},
		'thread_id' => function(){
			return factory('Forum\Thread')->create()->id;
		},
		'body' => $faker->paragraph,
	];
});