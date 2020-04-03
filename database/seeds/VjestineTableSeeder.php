<?php

use Illuminate\Database\Seeder;
use \App\Vjestina;

class VjestineTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tip =   new Vjestina([
            'naziv' => 'Njemački jezik',
            'opis' =>  'Njemački jezik opis...'
        ]);
        $tip->save();

        
        $tip =   new Vjestina([
            'naziv' => 'Engleski jezik',
            'opis' =>  'Engleski jezik opis...'
        ]);
        $tip->save();

        
        $tip =   new Vjestina([
            'naziv' => 'Talijanski jezik',
            'opis' =>  'Talijanski jezik opis...'
        ]);
        $tip->save();
        
        $tip =   new Vjestina([
            'naziv' => 'Španjolski jezik',
            'opis' =>  'Španjolski jezik opis...'
        ]);
        $tip->save();
        
        $tip =   new Vjestina([
            'naziv' => 'Hrvatski jezik',
            'opis' =>  'Hrvatski jezik opis...'
        ]);
        $tip->save();

        $tip =   new Vjestina([
            'naziv' => 'Bosanski jezik',
            'opis' =>  'Bosanski jezik opis...'
        ]);
        $tip->save();
    }
}
