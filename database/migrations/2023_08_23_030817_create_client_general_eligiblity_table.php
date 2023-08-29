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
        Schema::create('clients_general_eligiblity', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')
            ->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->enum('sex_at_birth',['Male','Female']);
            $table->string('client_age');
            $table->enum('had_total_hysterectomy',['Yes','No']);
            $table->enum('been_on_cervical_cancer_treatment',['Yes','No']);
            $table->enum('screened_negative_of_cervical_cancer_past_tweleve_mnth',['Yes','No']);
            $table->enum('general_eligiblity_status',['eligible','ineligible']);
            $table->timestamps();
        });
    }







    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client_general_eligiblity');
    }
};
