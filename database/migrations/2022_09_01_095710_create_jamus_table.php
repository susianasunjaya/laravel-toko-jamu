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
        Schema::create('jamus', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('merk');
            $table->enum('variety', ['Beras Kencur','Kunyit Asam','Temulawak','Galian Singset','Brotowali','Others']);
            $table->integer('stock');
            $table->integer('price');
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
        Schema::dropIfExists('jamus');
    }
};
