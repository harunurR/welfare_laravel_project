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
        Schema::create('account_head_views', function (Blueprint $table) {
            $table->id();
            $table->string('master_head');
            $table->string('sub_head');
            $table->string('child_one');
            $table->string('child_two');
            $table->timestamps();
        });
        DB::table('account_head_views')->insert([
            [
                'master_head' => '1',
                'sub_head' => 'Current Assets',
                'child_one' => 'Cash',
                'child_two' => 'Petty Cash',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'master_head' => '1',
                'sub_head' => 'Current Assets',
                'child_one' => 'Cash',
                'child_two' => 'Main Cash',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'master_head' => '5',
                'sub_head' => 'Revenue Expenses',
                'child_one' => 'Salary',
                'child_two' => 'Staff Salary',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'master_head' => '5',
                'sub_head' => 'Revenue Expenses',
                'child_one' => 'Salary',
                'child_two' => 'Night Guard Salary',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'master_head' => '5',
                'sub_head' => 'Revenue Expenses',
                'child_one' => 'Rent Expense',
                'child_two' => 'Office Rent',
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
        Schema::dropIfExists('account_head_views');
    }
};
