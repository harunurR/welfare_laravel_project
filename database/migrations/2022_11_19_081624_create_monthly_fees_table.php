<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monthly_fees', function (Blueprint $table) {
            $table->id();
            $table->string('category_id');
            $table->string('month');
            $table->decimal('amount',10,2);
            $table->text('note');

            // default
            $table->unsignedBigInteger('created_by')->index()->default(2);
            $table->unsignedBigInteger('updated_by')->index()->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
        DB::table('monthly_fees')->insert([
            [
                'category_id' => '1',
                'month' => '2022-11',
                'amount' => '10000.00',
                'note' => 'These are annual fees.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],[
                'category_id' => '2',
                'month' => '2022-11',
                'amount' => '1000.00',
                'note' => 'These are monthly fees.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'category_id' => '3',
                'month' => '2022-11',
                'amount' => '500.00',
                'note' => 'There are subscription fees.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('monthly_fees');
    }
};
