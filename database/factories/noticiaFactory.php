<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Noticia;
use Faker\Generator as Faker;

$factory->define(Noticia::class, function (Faker $faker) {
    return [
        'titulo'=>$faker->sentence,
        'slug'=>$faker->word,
        'texto'=>$faker->text(500),
        'imagen'=>$faker->imageUrl,
        'idcategoria'=>$faker->randomElement(array(1, 2, 3, 4, 5, 6, 7, 8)),
        'fechapublicacion'=>$faker->dateTimeBetween('-2 year', 'today')
    ];
});
