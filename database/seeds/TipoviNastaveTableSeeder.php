<?php

use App\TipNastave;
use Illuminate\Database\Seeder;

class TipoviNastaveTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tip =   new TipNastave([
            'naziv' => 'Instrukcije 1 na 1 - UŽIVO',
            'opis' =>  'Instrukcije 1 na 1 - UŽIVO'
        ]);
        $tip->save();

        
        $tip =   new TipNastave([
            'naziv' => 'Instrukcije 1 na 1 - ONLINE',
            'opis' =>  'Instrukcije 1 na 1 - ONLINE'
        ]);
        $tip->save();

        
        $tip =   new TipNastave([
            'naziv' => 'Instrukcije grupno - UŽIVO',
            'opis' =>  'Instrukcije grupno - UŽIVO'
        ]);
        $tip->save();


        
        $tip =   new TipNastave([
            'naziv' => 'Instrukcije grupno - ONLINE',
            'opis' =>  'Instrukcije grupno - ONLINE'
        ]);
        $tip->save();


        $tip =   new TipNastave([
            'naziv' => 'Tečaj - UŽIVO',
            'opis' =>  'Tečaj - UŽIVO'
        ]);
        $tip->save();


        
        $tip =   new TipNastave([
            'naziv' => 'Tečaj - ONLINE',
            'opis' =>  'Tečaj - ONLINE'
        ]);
        $tip->save();

        
 
        
    }
}
