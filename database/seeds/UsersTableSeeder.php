<?php

use App\Models\User;
use Illuminate\Database\Seeder;

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
            'name' => 'admin',
            'email' => 'admin@mail.com',
            'is_admin' => true,
            'password' => bcrypt('secret')
        ]);

        User::create([
            'name' => 'Test User',
            'email' => 'user@mail.com',
            'is_admin' => true,
            'password' => bcrypt('secret')
        ]);
    }
}
