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
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('complain_id');
            $table->text('assign_description');
            $table->foreignId('assign_status');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('complain_id')->references('id')->on('complains');
            $table->foreign('assign_status')->references('id')->on('assign_statuses');
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
