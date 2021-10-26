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
        //
        DB::table('categories')->insert([
            [
                'name' => 'Health',
                'slug' => 'health',
                'created_at' => now(),
                'updated_at' => now(),
                ],
                [
                    'name' => 'Crime',
                    'slug' => 'crime',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
        ]);
    }
}
