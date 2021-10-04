<?php

use App\Models\DetailsChanson;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParoleOriginalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parole_originales', function (Blueprint $table) {
            $table->id();
            $table->longText('parole_originale');
            $table->foreignIdFor(DetailsChanson::class)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parole_originales');
    }
}
