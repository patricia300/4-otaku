<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sources = [
            ['titre_source' => 'Naruto', 'auteur' => 'Mashashi Kishimoto' , 'created_at' => now() , 'updated_at' => now()],
            ['titre_source' => 'Naruto Shipudden' , 'auteur' => 'Mashashi Kishimoto' , 'created_at' => now() , 'updated_at' => now() ],
            ['titre_source' => 'Demon Slayer' , 'auteur' => 'Koyoharu Gotouge' , 'created_at' => now() , 'updated_at' => now()],
            ['titre_source' => 'Jujutsu Kaisen' , 'auteur' => 'Gege Akutami' , 'created_at' => now() , 'updated_at' => now()],
            // ['titre_source' => 'Goblin' , 'auteur' => 'unknown','type' => 'k-drama' , 'created_at' => now() , 'updated_at' => now()],
        ];

        DB::table('sources')->insert($sources);
    }
}
