<?php

use App\Models\Categorie;
use App\Models\DetailsChanson;
use App\Models\ParoleOriginale;
use App\Models\Source;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnDetailsChansonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('details_chansons', function (Blueprint $table) 
        {
            $table->foreignIdFor(Categorie::class)->nullable()->constrained('categories');
            $table->foreignIdFor(ParoleOriginale::class)->nullable()->constrained('parole_originales');    
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
