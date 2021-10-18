<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('user_type',['user','admin'])->default('user');
            $table->rememberToken();
            $table->timestamps();
        });

        //insert admin
		\DB::table('users')->insert([
			'name' => 'Admin',
			'email' => 'admin@yopmail.com',
			'email_verified_at' => date('Y-m-d H:i:s'),
			'password' => \Hash::make('12345678'),
            'user_type' => 'admin'
		]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
