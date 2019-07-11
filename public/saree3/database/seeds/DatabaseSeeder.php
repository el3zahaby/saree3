<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
          //$this->call(SettingsTableseeder::class);
          //$this->call(UserSeeder::class);
          //$this->call(StaffSeeder::class);
          //$this->call(SectionSeeder::class);
          //$this->call(TagsSeed::class);
          //$this->call(permitions::class);
          $this->call(SettingsTableseeder::class);



      
    }
}
