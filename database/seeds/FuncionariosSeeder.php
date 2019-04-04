<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Funcionario;

class FuncionariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('funcionarios')->insert([
            'nombre' => 'Juan Gomez',
            'cargo' => 'Director',
        ]);
        Funcionario::create([
            'nombre' => 'Pedro Pérez',
            'cargo' => 'Asistente Director',
        ]);

        factory(App\Funcionario::class, 25)->create();
    }
}
