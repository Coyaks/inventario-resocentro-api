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
        Schema::create('modules', function (Blueprint $table) {
            $table->id();
            $table->integer('id_parent')->default(0);
            $table->integer('id_type_user')->default(1);
            $table->integer('sort')->default(0);
            $table->string('name', 255);
            $table->string('url', 255)->nullable();
            $table->text('icon')->nullable();
            $table->tinyInteger('root')->default(1);
            $table->tinyInteger('section')->default(0);
            $table->integer('level')->default(0);
            $table->json('badge')->nullable();
            $table->tinyInteger('state')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('modules');
    }
};
