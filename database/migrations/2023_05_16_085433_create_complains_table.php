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
        Schema::create('complains', function (Blueprint $table) {
            $table->id('complain_id');
            $table->foreignId('user_report_id');
            $table->foreignId('place_id');
            $table->string('complain_title');
            $table->text('complain_description');
            $table->char('complain_category');
            $table->char('complain_urgency');
            $table->string('status_report');
            $table->timestamps();

            $table->foreign('user_report_id')->references('id')->on('users');
            $table->foreign('place_id')->references('id')->on('place');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('complains');
    }
};
