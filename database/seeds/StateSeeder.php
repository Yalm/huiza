<?php

use Illuminate\Database\Seeder;
use App\State;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        State::create([
            'name' => 'cancelado'
        ]);
        
        State::create([
            'name' => 'aprobado'
        ]);

        State::create([
            'name' => 'falta de pago'
        ]);

        State::create([
            'name' => 'pendiente de revisión'
        ]);

        State::create([
            'name' => 'creado'
        ]);

        State::create([
            'name' => 'denegado'
        ]);
    }
}
