<?php

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
        DB::table('users')->insert([
            [
                'username' => 'Nagase_Moe',
                'mail' => 'nagasemoe@gmail.com',
                'password' => bcrypt('nagase'),
                'bio' => 'よろしくお願いします',
                'images' => '']
        ]);
        //
    }
}
