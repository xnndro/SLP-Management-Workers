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
        Schema::dropIfExists('paid_leave_categories');

        Schema::create('paid_leave_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('desc');
            $table->text('info');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Schema::dropIfExists('paid_leave_categories');
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
};
