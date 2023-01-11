<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = \App\Models\User::create([
            'first_name' => 'super',
            'last_name' => 'admin',
            'email' => 'super@app.com',
            'password' => bcrypt('1111'),
        ]);

        $user -> attachRole('super_admin');
    }
}
