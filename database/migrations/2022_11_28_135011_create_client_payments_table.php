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
        Schema::create('client_payments', function (Blueprint $table) {
            $table->id();
            $table->string('client_id');
            $table->string('project_info_id');
            $table->string('date');
            $table->string('method');
            $table->decimal('amount',10,2)->nullable();
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
        Schema::dropIfExists('client_payments');
    }
};
