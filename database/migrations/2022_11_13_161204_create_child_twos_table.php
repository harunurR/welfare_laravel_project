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
        Schema::create('child_twos', function (Blueprint $table) {
            $table->id();
            $table->string('child_one_id');
            $table->string('head_name');
            $table->string('head_code');
            $table->string('opening_balance');
            $table->timestamps();
            $table->softDeletes();
        });
        DB::table('child_twos')->insert([
            [
                'child_one_id' => '6',
                'head_name' => 'Staff Salary',
                'head_code' => '52001001',
                'opening_balance' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'child_one_id' => '6',
                'head_name' => 'Night Guard Salary',
                'head_code' => '52001002',
                'opening_balance' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'child_one_id' => '1',
                'head_name' => 'Petty Cash',
                'head_code' => '11001001',
                'opening_balance' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'child_one_id' => '1',
                'head_name' => 'Main Cash',
                'head_code' => '11001002',
                'opening_balance' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'child_one_id' => '9',
                'head_name' => 'Office Rent',
                'head_code' => '52004001',
                'opening_balance' => '0',
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
        Schema::dropIfExists('child_twos');
    }
};
