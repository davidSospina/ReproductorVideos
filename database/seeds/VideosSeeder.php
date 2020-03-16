<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class VideosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker::create();
      for ($i=0; $i < 50; $i++) {
          \DB::table('videos')->insert(array(
                 'nombre' => 'Guia ' . $faker->firstNameFemale . ' ' . $faker->lastName,
                 'duracion'  => $faker->randomElement(['2','3','6']),
                 'descripcion'  => $faker->randomElement(['seccion 1','seccion 2','seccion 3']),
                 'imagen'  => $faker->randomElement(['img 1','img 2','img 3']),
                 'video'  => $faker->randomElement(['vid 1','vid 2','vid 3']),
                 'estado'  => $faker->randomElement(['por revisar','publicar','privado']),
                 'created_at' => date('Y-m-d H:m:s'),
                 'updated_at' => date('Y-m-d H:m:s')
          ));
      }
    }
}
