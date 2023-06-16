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
            $table->id('decline_id');
            $table->foreignId('assignment_id');
            $table->text('decline_description');
            $table->timestamps();

            $table->foreign('assignment_id')->references('assignment_id')->on('complain_assignments');
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
