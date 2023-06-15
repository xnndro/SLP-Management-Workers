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
        Schema::dropIfExists('paid_leave_requests');

        Schema::create('paid_leave_requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('category_id');
            $table->date('start_date');
            $table->date('end_date');
            $table->enum('status', ['1', '2', '3'])->comment('1=Dalam  Proses, 2=Disetujui, 3=Ditolak');
            $table->text('message');
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('paid_leave_categories');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Schema::dropIfExists('paid_leave_requests');
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
};
