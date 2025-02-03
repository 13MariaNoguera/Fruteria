<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Fruta;
use Faker\Factory as Faker;

class FrutaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void {
        
        $faker = Faker::create();

        $imagenes = [
            'Manzana' => 'https://www.frutality.es/wp-content/uploads/manzana-royal.png',
            'Plátano' => 'https://www.matiasbuenosdias.com/1336-large_default/platano.jpg',
            'Pera' => 'https://img.freepik.com/fotos-premium/pera-fondo-blanco_932514-325.jpg',
            'Naranja' => 'https://img.freepik.com/fotos-premium/frutas-color-naranja_770606-4835.jpg',
            'Melocotón' => 'https://frutasolivar.com/wp-content/uploads/2020/05/melocoton.jpg',
            'Fresa' => 'https://guillenmerca.es/wp-content/uploads/2019/04/FRESA2-scaled.jpg',
            'Kiwi' => 'https://imag.bonviveur.com/un-kiwi-entero-y-corte-transversal-de-un-kiwi.jpg',
            'Cereza' => 'https://www.hortifrut.com/wp-content/uploads/2020/08/desc-cerezas.jpg',
            'Piña' => 'https://www.gob.mx/cms/uploads/image/file/415269/pi_a_1.jpg',
            'Mango' => 'https://exoticfruitbox.com/wp-content/uploads/2015/10/mango.jpg',
        ];

        for($i = 0; $i < 10; $i++) {
            $nombreFruta = $faker->randomElement(array_keys($imagenes));

            $fruta = new Fruta();
            $fruta->imagen = $imagenes[$nombreFruta];
            $fruta->nombre = $nombreFruta;
            $fruta->temporada = $faker->randomElement(['Primavera', 'Verano', 'Otoño', 'Invierno']);
            $fruta->precio = $faker->randomFloat(2, 0.5, 5);
            $fruta->stock = $faker->numberBetween(0, 200);
            $fruta->created_at = now();
            $fruta->updated_at = now();
            $fruta->save();
        }
    }
}
