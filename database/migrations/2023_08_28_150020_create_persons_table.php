<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up() : void
    {
        Schema::create('persons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_type_person');
            $table->string('name', 150);
            $table->string('surname', 200)->nullable();
            $table->string('document', 15)->nullable();
            $table->string('email', 255)->nullable();
            $table->string('phone', 20)->nullable();
            $table->text('address')->nullable();
            $table->integer('id_city')->nullable();
            $table->integer('id_province')->nullable();
            $table->integer('id_district')->nullable();
            $table->string('contact_person', 255)->nullable();
            $table->date('birth_date')->nullable();
            $table->tinyInteger('age')->nullable();
            $table->text('observations')->nullable();
            $table->char('gender', 1)->nullable();
            $table->tinyInteger('state')->default(1);
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down() : void
    {
        Schema::dropIfExists('persons');
    }
};
