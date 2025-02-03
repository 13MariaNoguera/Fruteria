<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Usuario;
use Faker\Factory as Faker;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void {
        $usuario = new Usuario();
        $usuario->username = 'admin';
        $usuario->password = bcrypt('admin');
        $usuario->save();
    }
}
