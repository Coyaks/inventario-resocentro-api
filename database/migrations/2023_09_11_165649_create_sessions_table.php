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
        Schema::create('sessions', function (Blueprint $table) {
            $table->id();
            $table->integer('id_user')->nullable();
            $table->string('uuid')->nullable();
            $table->text('token')->nullable();
            $table->string('platform', 50)->nullable();
            $table->string('language', 50)->nullable();
            $table->string('os', 30)->nullable();
            $table->string('os_version', 50)->nullable();
            $table->string('device_brand', 50)->nullable();
            $table->string('device_model', 50)->nullable();
            $table->string('app_version', 10)->nullable();
            $table->float('lat')->default(0);
            $table->float('lng')->default(0);
            $table->string('user_agent', 100)->nullable();
            $table->tinyInteger('state')->default(1);
            $table->dateTime('date_expiration')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sessions');
    }
};
