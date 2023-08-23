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
        Schema::create('risk_classifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')
            ->constrained()
            ->onUpdate('cascde')
            ->onDelete('cascade');
            $table->text('first_age_of_sexual_intercourse');
            $table->text('no_of_sexual_partners_past_six_month');
            $table->enum('regular_sexual_intercourse_without_condom',['Yes','No']);
            $table->enum('hiv_status',['Positive','Negative','Unsure']);
            $table->enum('compliant_with_hiv_medication',['Yes','No'])->nullable;
            $table->enum('smoke_cigarettes',['Yes','No']);
            $table->enum('ever_been_diagonosed_with_stds',['Yes','No']);
            $table->text('number_of_pregnancies');
            $table->enum('hpv_vaccinated',['Yes','No','Unsure']);
            $table->enum('parents_and_grandparents_been_with_cancer',['Yes','No']);
            $table->json('currently_possess_symptoms')->nullable();
            $table->timestamps()-useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('risk_classification');
    }
};
