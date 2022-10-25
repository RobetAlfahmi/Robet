<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=> 'admin',
            'email'=> 'admin@gmail.com',
            'password'=> bcrypt('123456'),
            'role'=> 'admin'
        ]);

        User::create([
            'name'=> 'Pak Lukman',
            'email'=> 'walas@gmail.com',
            'password'=> bcrypt('123456'),
            'role'=> 'walas'
        ]);

        User::create([
            'name'=> 'Robet Alfahmi',
            'email'=> 'siswa@gmail.com',
            'password'=> bcrypt('123456'),
            'role'=> 'siswa'
        ]);
    }
}
