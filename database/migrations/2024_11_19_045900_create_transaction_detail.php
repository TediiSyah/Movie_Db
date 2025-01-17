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
        Schema::create('transaction_detail', function (Blueprint $table) {
            $table->integer("id")->autoIncrement();
            $table->integer("transaction_id");
            $table->integer("movie_id");
            $table->integer("quantity");
            $table->timestamps();

            $table->foreign("transaction_id")->references("id")->on("transaction");
            $table->foreign("movie_id")->references("id")->on("movie");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaction_detail');
    }
};
