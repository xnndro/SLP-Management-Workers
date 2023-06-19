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
        Schema::create('inventaris', function (Blueprint $table) {
            $table->id();
            $table->string('inventaris_name');
            $table->string('inventaris_image');
            $table->string('inventaris_description');
            $table->unsignedBigInteger('inventaris_total');
            $table->foreignId('inventaris_role_id')->references('id')->on('inventaris_roles');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('inventaris')  ;
    }
};
