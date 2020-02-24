<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user =   new User([
            'name' => 'Admin',
            'lastname' => 'Admin',
            'email' => 'admin@gmail.com',
            'adresa' => 'Ugljara 202b',
            'edukacija' => 'FPMOZ Informatika',
            'vjestine' => '1,2,3,4',
            'password' => bcrypt('asd123'),
            'telefon' => '064 234 234',
            'about'   => 'about me...',
            'dodatno' => 'dodatane informacije...',
            'titula'  => 'prof. dr. sc.',
            'spol'    => 'M',
            'RFID' => '111111111111',
            'role' => 'admin'
        ]);
        $user->save();

        
        $user =   new User([
            'name' => 'Predavac1',
            'lastname' => 'Predavac1',
            'email' => 'predavac1@gmail.com',
            'adresa' => 'Ugljara 202b',
            'edukacija' => 'FPMOZ Informatika',
            'vjestine' => '1,2,3,4',
            'password' => bcrypt('asd123'),
            'telefon' => '064 234 234',
            'RFID' => '222222222222',
            'about'   => 'about me...',
            'dodatno' => 'dodatane informacije...',
            'titula'  => 'prof. dr. sc.',
            'spol'    => 'M',
            'role' => 'predavac'
        ]);
        $user->save();

        
        $user =   new User([
            'name' => 'User1',
            'lastname' => 'User1',
            'email' => 'user1@gmail.com',
            'adresa' => 'Ugljara 202b',
            'edukacija' => 'FPMOZ Informatika',
            'vjestine' => '1,2,3,4',
            'password' => bcrypt('asd123'),
            'telefon' => '064 234 234',
            'about'   => 'about me...',
            'dodatno' => 'dodatane informacije...',
            'titula'  => 'prof. dr. sc.',
            'spol'    => 'M',
            'RFID' => '333333333333',
            'role' => 'user'
        ]);
        $user->save();
    }
}
