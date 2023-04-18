<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Patients extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('entity_id')->nullable();
            $table->string('name');
            $table->string('identification')();
            $table->string('phone')->nullable();
            $table->string('age')->nullable();
            $table->string('address')->nullable();
            $table->integer('service_id')->nullable();
            $table->string('service')->nullable();
            $table->string('position')->nullable();
            $table->enum('status',['process','call','done','cancel'])->default('process');
            $table->rememberToken();
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
        Schema::dropIfExists('patients');
    }
}
