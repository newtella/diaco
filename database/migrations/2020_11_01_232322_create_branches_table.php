<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBranchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branches', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->bigInteger('phone');
            $table->string('address');
            $table->unsignedBigInteger('municipality_id');
            $table->unsignedBigInteger('shop_id');

            $table->timestamps();

            $table->foreign('municipality_id')->references('id')->on('municipalities')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            
            $table->foreign('shop_id')->references('id')->on('shops')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('branches');
    }
}
