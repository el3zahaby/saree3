<?php

use Illuminate\Database\Seeder;

class StaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('staff')->insert([
            'name' => 'devloper',
            'username' =>'devloper',
            'email' => 'devloper@devloper.com',
            'password' => '$2y$10$SOw/23kv0CQQGviKsk66pepqS.1weCsU1eV3D8X.Hb42SgNlr7TGS'
       ]);
    }
}
