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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('client_name');
            $table->string('client_identification');
            $table->date('date_of_birth');
            $table->string('nationality');
            $table->unsignedBigInteger('telephone_contact');
            $table->enum('gender',['male','female']);
            $table->string('population_category');
            $table->string('other_population_category')->nullable();
            $table->timestamps()->useCurrent();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client');
    }
};
