<?php

class UserTableSeeder extends Seeder {

    public function run() {
        DB::table('users')->delete();
        User::create(array(
            'email' => 'admin@admin.com',
            'password' => Hash::make('4dm1n4dm1n'),
        ));
    }

}
