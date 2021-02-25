<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;
use Psy\Util\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            ['category' => 'Архитектурное проектирование', 'slug'=>'architect'],
            ['category' => 'Дизайн интерьеров','slug'=>'design']
            ]
        );
    }
}
