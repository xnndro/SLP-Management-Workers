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
        Schema::create('complain_declines', function (Blueprint $table) {
            $table->id();
            $table->foreignId('complain_assignment_id');
            $table->text('decline_description');
            $table->timestamps();

            $table->foreign('complain_assignment_id')->references('id')->on('complain_assignments');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('complain_declines');
    }
};
