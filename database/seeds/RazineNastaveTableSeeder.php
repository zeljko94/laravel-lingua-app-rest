<?php

use App\RazinaNastave;
use Illuminate\Database\Seeder;

class RazineNastaveTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $tip =   new RazinaNastave([
            'naziv' => 'A1',
            'opis' =>  'A1'
        ]);
        $tip->save();

        $tip =   new RazinaNastave([
            'naziv' => 'A2',
            'opis' =>  'A2'
        ]);

        $tip =   new RazinaNastave([
            'naziv' => 'B1',
            'opis' =>  'B1'
        ]);
        $tip->save();

        $tip =   new RazinaNastave([
            'naziv' => 'B2',
            'opis' =>  'B2'
        ]);

        $tip =   new RazinaNastave([
            'naziv' => 'C1',
            'opis' =>  'C1'
        ]);
        $tip->save();

        $tip =   new RazinaNastave([
            'naziv' => 'C2',
            'opis' =>  'C2'
        ]);
        $tip->save();
    }
}
