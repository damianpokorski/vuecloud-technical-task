<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminUserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        
        DB::table('users')->insert([
            'name' => 'administrator',
            'email' => 'admin@admin.com',
            'password' =>'$2y$10$JcakvS1JPomsCerkrYgHKe25//a4HBRhhu8L0Ka2TlimvfImAH4VG',
            'created_at' => '2018-12-26 22:42:50',
            'updated_at' => '2018-12-26 22:42:50'
        ]);
    }
}
