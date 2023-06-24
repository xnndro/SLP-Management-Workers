<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::dropIfExists('panduan');
        Schema::create('panduan', function (Blueprint $table) {
            $table->id();
            $table->string('panduan_title');
            $table->text('panduan_content');
            $table->string('panduan_image');
            $table->unsignedBigInteger('inventaris_role_id');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('panduan');
    }
};
