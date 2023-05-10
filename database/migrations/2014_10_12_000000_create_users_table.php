<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::dropIfExists('users');

        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('user_nik');
            $table->date('user_join_date');
            $table->string('user_role');
            $table->rememberToken();
            $table->timestamps();
        });
        
        DB::table('users')->insert([
            ['name' => 'supervisor', 'email' => 'supervisor@stavvy.com','password'=> Hash::make('supervisor'), 'user_nik' => '123456789', 'user_join_date' => '2021-01-01', 'user_role' => 'supervisor'],
            ['name' => 'workers', 'email' => 'workers@stavvy.com','password'=>Hash::make('workers'), 'user_nik' => '123456789', 'user_join_date' => '2021-01-01', 'user_role' => 'user'],
        ]);
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Schema::dropIfExists('users');
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
};
