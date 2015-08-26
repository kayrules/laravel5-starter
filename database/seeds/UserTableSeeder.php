<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        $now = date('Y-m-d H:i:s');

        User::create(array(
            'email' => 'admin@domain.com',
            'password' => Hash::make('1q2w3e4r'),
            'name' => 'Administrator',
            'created_at' => $now,
            'updated_at' => $now
        ));
    }
}
