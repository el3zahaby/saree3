
<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()  {
       DB::table('users')->insert([
            'name' => 'ayoub tamous',
            'email' => 'ayoub@gmail.com',
            'password' => '$2y$10$SOw/23kv0CQQGviKsk66pepqS.1weCsU1eV3D8X.Hb42SgNlr7TGS',
            'country' => 'المغرب',
            'city' => 'KASBA TADLA'
       ]);
    }
}
