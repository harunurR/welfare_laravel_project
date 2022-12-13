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
        Schema::create('project_infos', function (Blueprint $table) {
            $table->id();
            $table->string('client_id');
            $table->string('project_name');
            $table->string('description');
            $table->string('amount');
            $table->string('duration');
            $table->string('starting_date');
            $table->string('end_date');
            $table->string('profit_projections');
            $table->string('return_date')->nullable();
            $table->string('return_profit')->nullable();
            $table->boolean('status')->default(1);

            // default
            $table->unsignedBigInteger('created_by')->index()->default(1);
            $table->unsignedBigInteger('updated_by')->index()->nullable();
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
        Schema::dropIfExists('project_infos');
    }
};
