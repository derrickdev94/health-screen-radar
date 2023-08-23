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
        Schema::create('clients_current_eligiblity', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')
            ->constrained()
            ->onUpdate('cascde')
            ->onDelete('cascade');
            $table->enum('currently_menstruating',['Yes','No']);
            $table->text('currently_menstruating_comment');
            $table->string('days_since_last_menstruation_period');
            $table->text('last_menstruation_period_comment')->nullable();
            $table->enum('currently_pregnant_or_been_past_three_mnth',['Yes','No','null'])->nullable();
            $table->text('currently_pregnant_or_been_past_three_mnth_comment')->nullable();
            $table->json('symptoms_indicating_advanced_illness')->nullable();
            $table->enum('current_eligiblity_status',['eligible','ineligible']);
            $table->timestamps()->useCurrent();
        });
    }








    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client_current_eligiblity');
    }
};
