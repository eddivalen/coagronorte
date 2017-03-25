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
$factory->define(App\Usuario::class, function (Faker\Generator $faker) {
    static $password;

    return [
		'cedula'              => $faker->numberBetween($min = 3000000, $max = 30000000),
		'nombre_usuario'      => $faker->firstNameMale,
		'nombre'              => $faker->firstNameMale,
		'apellido'            => $faker->lastName,
		'correo_electronico'  => $faker->unique()->safeEmail,
		'password'            => bcrypt('123456'),
		'telefono'            => $faker->phoneNumber,
		'fecha_inscripcion'   => $faker->dateTimeThisYear($max = 'now', $timezone = date_default_timezone_get()),
		'codigo_tipo_usuario' => 3,
		'confirmacion'        => 1,
		'confirmation_token'  => $faker->uuid,
    ];
});
$factory->define(App\Lote::class, function(Faker\Generator $faker){
	return [
		'vereda'               => $faker->streetName,
		'codigo_zona'          => 1,
		'area'                 => $faker->randomFloat($nbMaxDecimals = 2, $min = 200, $max = 2000),
		'propietario'          => 21417201,
		'tenencia'             => $faker->randomElement($array = array ('propio','arriendo','vencimiento')),
		'analisis_suelo'       => $faker->boolean,
		'fecha_analisis_suelo' => $faker->date($format = 'Y-m-d', $max = 'now'),
		'pinsat'               => $faker->boolean,
		'planos'               => $faker->boolean,
		'archivo_planos'       => $faker->imageUrl($width = 640, $height = 480),
		'venta'                => $faker->boolean,
		'asistencia_tecnica'   => $faker->boolean,
		'codigo_riego'         => 1,
		'longitud'             => $faker->longitude($max = -80, $min = -50),
		'latitud'              => $faker->latitude($max = 10, $min = -4),
	];
});
$factory->define(App\Siembra::class, function(Faker\Generator $faker){
	return [
		'fecha_siembra'          => => $faker->dateTimeBetweenFormat($startDate = 'now', $endDate = '+1 week', $timezone = null, $format = 'Y-m-d'),
		'fecha_siembra_estimada' => $faker->date($format = 'Y-m-d', $max = 'now'),
		'fecha_estimada_corta'   => $faker->date($format = 'Y-m-d', $max = 'now'),
		'fecha_real_corta'       => $faker->date($format = 'Y-m-d', $max = 'now'),
		'codigo_lote'            => 1,
		'dias_germinado'         => $faker->dayOfMonth($max = 'now'),
		'hectareas'              => $faker->randomFloat($nbMaxDecimals = 2, $min = 200, $max = 2000),
		'punto_referencia'       => $faker->streetName,
		'sistema_preparacion'    => $faker->word,
		'codigo_tipo_semilla'    => 2,
		'codigo_variedad'        => 1,
		'codigo_tipo_siembra'    => 1,
		'arroz_rojo'             => $faker->randomElement($array = array ('alto','medio','bajo')),
		'semilla_objetable'      => $faker->boolean,
		'rendimiento_ha'         => $faker->randomFloat($nbMaxDecimals = 2, $min = 200, $max = 2000),
		'observaciones'          => $faker->sentence($nbWords = 6, $variableNbWords = true),
	];
});
$factory->define(App\Visita::class, function(Faker\Generator $faker){
	return [
		'codigo_siembra'       => 1,
		'fecha'                => $faker->dateTimeBetweenFormat($startDate = 'now', $endDate = '+1 week', $timezone = null, $format = 'Y-m-d'),
		'presencia_agricultor' => $faker->boolean,
		'registro_ausencia'    => $faker->sentence($nbWords = 6, $variableNbWords = true),
		'validado'             => $faker->boolean,
		'valoracion'           => $faker->numberBetween($min = 1, $max = 5),
		'opinion'              => $faker->sentence($nbWords = 6, $variableNbWords = true),
		'agronomo'             => 21417201,
		'archivo'              => $faker->imageUrl($width = 640, $height = 480),
	];
});