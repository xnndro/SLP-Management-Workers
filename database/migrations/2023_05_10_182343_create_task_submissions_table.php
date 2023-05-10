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
        Schema::dropIfExists('task_submission');

        Schema::create('task_submission', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('task_management_id');
            $table->string('task_report');
            $table->string('task_comment');
            $table->timestamps();

            // $table->foreign('task_management_id')->references('id')->on('task_management');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('task_submission');
    }
};
