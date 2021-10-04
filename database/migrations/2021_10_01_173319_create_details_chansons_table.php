<?php

use App\Models\Source;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailsChansonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('details_chansons', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->string('artiste');
            // $table->string('categorie');
            $table->integer('numero')->default(null);
            $table->integer('nb_vu')->default(0);
            $table->foreignIdFor(Source::class)->nullable();
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
        Schema::dropIfExists('details_chansons');
    }
}
