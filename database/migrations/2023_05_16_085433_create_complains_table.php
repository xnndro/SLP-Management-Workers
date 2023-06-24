<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('complains', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('place_id');
            $table->string('complain_title');
            $table->text('complain_description');
            $table->foreignId('complain_category');
            $table->foreignId('complain_urgency')->nullable()->default(null);
            $table->foreignId('report_status');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('place_id')->references('id')->on('place');
            $table->foreign('complain_category')->references('id')->on('complain_categories');
            $table->foreign('complain_urgency')->references('id')->on('complain_urgencies');
            $table->foreign('report_status')->references('id')->on('report_statuses');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Schema::dropIfExists('complains');
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
};
