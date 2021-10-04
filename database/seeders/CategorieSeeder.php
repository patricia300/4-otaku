<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['categorie' => 'ost', 'created_at' => now() , 'updated_at' => now()], 
            ['categorie' => 'opening', 'created_at' => now() , 'updated_at' => now()] ,
            ['categorie' => 'ending', 'created_at' => now() , 'updated_at' => now()]
        ];

        DB::table('categories')->insert($categories);
    }
}
