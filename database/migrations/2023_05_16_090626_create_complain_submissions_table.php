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
        Schema::create('complain_submissions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('complain_assignment_id');
            $table->text('submission_description');
            $table->string('submission_img');
            $table->text('submission_feedback');
            $table->foreignId('submission_status');
            $table->timestamps();

            $table->foreign('complain_assignment_id')->references('id')->on('complain_assignments');
            $table->foreign('submission_status')->references('id')->on('submission_statuses');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('complain_submissions');
    }
};
