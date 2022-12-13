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
        Schema::create('investor_information', function (Blueprint $table) {
            $table->id();
            $table->string('investor_id')->unique();
            $table->string('image')->nullable();
            $table->string('name');
            $table->string('father_name');
            $table->string('contact_no')->unique();
            $table->string('email')->unique();
            $table->string('national_id')->unique();
            $table->string('address')->nullable();
            $table->string('number_shares')->nullable();
            $table->string('nominee_name');
            $table->string('relationship');
            $table->string('joining_date')->nullable();
            $table->decimal('due',10,2)->default(0);
            $table->unsignedBigInteger('user_id')->nullable()->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            // default
            $table->boolean('status')->default(1);
            $table->unsignedBigInteger('created_by')->index()->default(1);
            $table->unsignedBigInteger('updated_by')->index()->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
        DB::table('investor_information')->insert([
            [
                'investor_id' => '1',
                'name' => 'Shahidul Islam',
                'father_name' => 'Abdul Mazid',
                'contact_no' => '01887621949',
                'email' => 'shahiduli555@gmail.com',
                'national_id' => '28058216',
                'address' => 'South Kanchana, Satkania, Chittagong',
                'number_shares' => '2',
                'joining_date' => '22-11-2022',
                'nominee_name' => 'Md. Tohid',
                'relationship' => 'Son',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'investor_id' => '2',
                'name' => 'Ashab Uddin',
                'father_name' => 'Abdul Samad',
                'contact_no' => '01777621950',
                'email' => 'ashab50@gmail.com',
                'national_id' => '28058324',
                'address' => 'Lohagara, Chittagong',
                'number_shares' => '1',
                'joining_date' => '22-11-2022',
                'nominee_name' => 'Md. Rabib',
                'relationship' => 'Son',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'investor_id' => '3',
                'name' => 'Md. Rabib',
                'father_name' => 'Jaker Hossain',
                'contact_no' => '01777621222',
                'email' => 'rabib22@gmail.com',
                'national_id' => '20585643',
                'address' => 'Hatia, Vula',
                'number_shares' => '1',
                'joining_date' => '22-11-2022',
                'nominee_name' => 'Ashab uddin',
                'relationship' => 'Son',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'investor_id' => '4',
                'name' => 'Md Tohidul Islam',
                'father_name' => 'Hossain Akbor',
                'contact_no' => '01777621225',
                'email' => 'tohid25@gmail.com',
                'national_id' => '28058565',
                'address' => 'Hatajari, Chittagong',
                'number_shares' => '1',
                'joining_date' => '22-11-2022',
                'nominee_name' => 'Hossain Akbor',
                'relationship' => 'father',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'investor_id' => '5',
                'name' => 'Biplop Uddin',
                'father_name' => 'Akter Hossion',
                'contact_no' => '01777621263',
                'email' => 'biplop63@gmail.com',
                'national_id' => '80585663',
                'address' => 'Noakhali',
                'number_shares' => '1',
                'joining_date' => '22-11-2022',
                'nominee_name' => 'Akter Hossion',
                'relationship' => 'father',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'investor_id' => '6',
                'name' => 'Sajedul Hoque',
                'father_name' => 'Abdul Kader',
                'contact_no' => '01777621242',
                'email' => 'sajedul42@gmail.com',
                'national_id' => '20585647',
                'address' => 'Boalkali, Chattrogram',
                'number_shares' => '1',
                'joining_date' => '22-11-2022',
                'nominee_name' => 'Abdul Kader',
                'relationship' => 'father',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'investor_id' => '7',
                'name' => 'Jalal Uddin',
                'father_name' => 'Md. Shahajan',
                'contact_no' => '01777621532',
                'email' => 'jalal32@gmail.com',
                'national_id' => '280856532',
                'address' => 'Chattrogram',
                'number_shares' => '1',
                'joining_date' => '22-11-2022',
                'nominee_name' => 'Md. Shahajan',
                'relationship' => 'father',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'investor_id' => '8',
                'name' => 'Md. Jahid',
                'father_name' => 'Samsul Alom',
                'contact_no' => '01777621578',
                'email' => 'jahid78@gmail.com',
                'national_id' => '280586578',
                'address' => 'Chattrogram',
                'number_shares' => '1',
                'joining_date' => '22-11-2022',
                'nominee_name' => 'Samsul Alom',
                'relationship' => 'father',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'investor_id' => '9',
                'name' => 'Saiful Islam',
                'father_name' => 'Jalal Uddin',
                'contact_no' => '01777621566',
                'email' => 'saiful66@gmail.com',
                'national_id' => '280586566',
                'address' => 'Satkania, Chattrogram',
                'number_shares' => '1',
                'joining_date' => '22-11-2022',
                'nominee_name' => 'Jalal Uddin',
                'relationship' => 'father',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'investor_id' => '10',
                'name' => 'Md. Rahat',
                'father_name' => 'Saiful Islam',
                'contact_no' => '01777621537',
                'email' => 'rahat37@gmail.com',
                'national_id' => '280856537',
                'address' => 'Chattrogram',
                'number_shares' => '1',
                'joining_date' => '22-11-2022',
                'nominee_name' => 'Saiful Islam',
                'relationship' => 'father',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'investor_id' => '11',
                'name' => 'Ariful Islam',
                'father_name' => 'Md. Rahat',
                'contact_no' => '01777621519',
                'email' => 'arif19@gmail.com',
                'national_id' => '280586519',
                'address' => 'Satkania, Chattrogram',
                'number_shares' => '1',
                'joining_date' => '22-11-2022',
                'nominee_name' => 'Md. Rahat',
                'relationship' => 'father',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'investor_id' => '12',
                'name' => 'Md. Nasim',
                'father_name' => 'Ariful Islam',
                'contact_no' => '01777621571',
                'email' => 'nasim71@gmail.com',
                'national_id' => '2855856571',
                'address' => 'Comilla',
                'number_shares' => '1',
                'joining_date' => '22-11-2022',
                'nominee_name' => 'Ariful Islam',
                'relationship' => 'father',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'investor_id' => '13',
                'name' => 'Haronur Rashid',
                'father_name' => 'Md. Nasim',
                'contact_no' => '01777621589',
                'email' => 'harun89@gmail.com',
                'national_id' => '2805456589',
                'address' => 'Satkania, Chattogram',
                'number_shares' => '1',
                'joining_date' => '22-11-2022',
                'nominee_name' => 'Md. Nasim',
                'relationship' => 'father',
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
        Schema::dropIfExists('investor_information');
    }
};
