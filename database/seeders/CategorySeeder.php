<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('primary_categories')->insert([
            [
                'name' => 'パソコン',
                'sort_order' => 1,
            ],
            [
                'name' => 'タブレット',
                'sort_order' => 2,
            ],
            [
                'name' => 'スマホ',
                'sort_order' => 3,
            ],
        ]);

        DB::table('secondary_categories')->insert([
            [
                'name' => 'windows',
                'sort_order' => 1,
                'primary_category_id' => 1
            ],
            [
                'name' => 'MAC',
                'sort_order' => 2,
                'primary_category_id' => 1
            ],
            [
                'name' => 'Chromebook',
                'sort_order' => 3,
                'primary_category_id' => 1
            ],
            [
                'name' => 'ipad',
                'sort_order' => 4,
                'primary_category_id' => 2
            ],
            [
                'name' => 'iphone',
                'sort_order' => 5,
                'primary_category_id' => 2
            ],
            [
                'name' => 'Android',
                'sort_order' => 6,
                'primary_category_id' => 2
            ],
        ]);
    }
}
