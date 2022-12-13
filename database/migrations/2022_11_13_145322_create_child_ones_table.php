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
        Schema::create('child_ones', function (Blueprint $table) {
            $table->id();
            $table->string('sub_head_id');
            $table->string('head_name');
            $table->string('head_code');
            $table->string('opening_balance');
            $table->timestamps();
            $table->softDeletes();
        });
        DB::table('child_ones')->insert([
            [
                'sub_head_id' => '1',
                'head_name' => 'Cash',
                'head_code' => '11001',
                'opening_balance' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'sub_head_id' => '1',
                'head_name' => 'Bank',
                'head_code' => '11002',
                'opening_balance' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'sub_head_id' => '2',
                'head_name' => 'land',
                'head_code' => '12001',
                'opening_balance' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'sub_head_id' => '10',
                'head_name' => 'Subscription',
                'head_code' => '41001',
                'opening_balance' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'sub_head_id' => '10',
                'head_name' => 'Income from Garbage',
                'head_code' => '41002',
                'opening_balance' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'sub_head_id' => '10',
                'head_name' => 'Income from Project',
                'head_code' => '41003',
                'opening_balance' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'sub_head_id' => '15',
                'head_name' => 'Salary',
                'head_code' => '52001',
                'opening_balance' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'sub_head_id' => '15',
                'head_name' => 'Electricity Bill',
                'head_code' => '52002',
                'opening_balance' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'sub_head_id' => '15',
                'head_name' => 'Miscellaneous expense',
                'head_code' => '52003',
                'opening_balance' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'sub_head_id' => '15',
                'head_name' => 'Rent Expense',
                'head_code' => '52004',
                'opening_balance' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'sub_head_id' => '15',
                'head_name' => 'Paint',
                'head_code' => '52005',
                'opening_balance' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'sub_head_id' => '15',
                'head_name' => 'Stationary Expense',
                'head_code' => '52006',
                'opening_balance' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'sub_head_id' => '15',
                'head_name' => 'Repair & Maintenance',
                'head_code' => '52007',
                'opening_balance' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'sub_head_id' => '15',
                'head_name' => 'Clean Expense',
                'head_code' => '52007',
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
        Schema::dropIfExists('child_ones');
    }
};
