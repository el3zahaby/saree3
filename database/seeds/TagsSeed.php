<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class TagsSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        DB::table("tags")->insert([
            ['name' => 'HTML'],
            ['name' => 'CSS'],
            ['name' => 'JavaScript'],
            ['name' => 'PHP'],
            ['name' => 'Mysql'],
            ['name' => 'Laravel'],
            ['name' => 'Symfony'],
            ['name' => 'Nodejs'],
            ['name' => 'Angulare']
        ]);




    }
}
