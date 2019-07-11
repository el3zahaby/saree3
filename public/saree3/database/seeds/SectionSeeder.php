<?php

use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sections')->insert([
            [
                'parent_id' => null,
                'title' => '{"ar":"\u0627\u0644\u0633\u064a\u0627\u0631\u0627\u062a","en":"cars"}',
                'slug'   => 'cars',
                'description' => '{"ar":"test","en":"test"}',
                'order' => 1
            ],
            [
                'parent_id' => 1,
                'title' => '{"ar":"\u0627\u0644\u0633\u064a\u0627\u0631\u0627\u062a \u0627\u0644\u0623\u0645\u0631\u064a\u0643\u064a\u0629","en":"usa"}',
                'slug'   => 'cars',
                'description' => '{"ar":"test","en":"test"}',
                'order' => 1
            ],
            [
            'parent_id' => 2,
            'title' => '{"ar":"BMV","en":"BMV"}',
            'slug'   => 'cars',
            'description' => '{"ar":"test","en":"test"}',
            'order' => 1
            ],
        ]);
    }
}
