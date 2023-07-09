<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

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
            $table->unsignedBigInteger('roles_id');
            $table->string('status')->default('active');
            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('users')->insert([
            ['name' => 'supervisor', 'email' => 'supervisor@stavvy.com', 'password' => Hash::make('supervisor'), 'user_nik' => '123456789', 'user_join_date' => '2021-01-01', 'roles_id' => 1],
            ['name' => 'user', 'email' => 'user@stavvy.com', 'password' => Hash::make('user'), 'user_nik' => '123456789', 'user_join_date' => '2021-01-01', 'roles_id' => 2],
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
