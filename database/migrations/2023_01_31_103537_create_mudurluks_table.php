<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mudurluks', function (Blueprint $table) {
            $table->id();
            $table->text("name");
            $table->unsignedBigInteger('daire_id')->nullable();
            $table->timestamps();

            $table->softDeletes();

            $table->index('daire_id', 'mudurluk_daire_idx');

            $table->foreign('daire_id', 'mudurluk_daire_fk')->on('daires')->references('id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mudurluks');
    }
};
