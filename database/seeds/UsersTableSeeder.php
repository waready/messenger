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
        User::create([
            'name' => 'Juan',
            'email' => 'hola@programacionymas.com',
            'password' =>   bcrypt('123456')
        ]);
        User::create([
            'name' => 'Pedro',
            'email' => 'Pedro@mail.com',
            'password' =>   md5('123456')
        ]);
    }
}
