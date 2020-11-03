<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComplainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complains', function (Blueprint $table) {
            $table->id();
            $table->string('document');
            $table->date('date');
            $table->string('reason');
            $table->string('request');
            $table->unsignedBigInteger('branch_id');
            $table->unsignedBigInteger('status_id');

            $table->timestamps();

            $table->foreign('branch_id')->references('id')->on('branches')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            
            $table->foreign('status_id')->references('id')->on('statuses')
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
        Schema::dropIfExists('complains');
    }
}
