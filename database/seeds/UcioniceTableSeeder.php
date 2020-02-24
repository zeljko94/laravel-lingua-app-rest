<?php

use Illuminate\Database\Seeder;
use App\Ucionica;

class UcioniceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $ucionica =   new Ucionica([
            'naziv' => 'Ucionica 1',
            'opis' =>  'Ucionica 1',
            'color' => '#FF0000'
        ]);
        $ucionica->save();
        
        $ucionica =   new Ucionica([
            'naziv' => 'Ucionica 2',
            'opis' =>  'Ucionica 2',
            'color' => '#00FF00'
        ]);
        $ucionica->save();

        $ucionica =   new Ucionica([
            'naziv' => 'Ucionica 3',
            'opis' =>  'Ucionica 3',
            'color' => '#0000FF'
        ]);
        $ucionica->save();

    }
}
