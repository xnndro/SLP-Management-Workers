<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('complain_assignments', function (Blueprint $table) {
            $table->id('assignment_id');
            $table->foreignId('user_assign_id');
            $table->text('assign_description');
            $table->string('status_assign');
            $table->timestamps();

            $table->foreign('user_assign_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('complain_assignments');
    }
};
