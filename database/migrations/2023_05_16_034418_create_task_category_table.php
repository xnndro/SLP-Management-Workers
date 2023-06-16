<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('task_category', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('panduan_id')->nullable();
            $table->string('task_category_name');
            $table->timestamps();

            $table->foreign('panduan_id')->references('id')->on('panduan');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('task_category');
    }
};
