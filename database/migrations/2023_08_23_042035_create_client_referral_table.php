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
        Schema::create('clients_referrals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')
            ->constrained()
            ->onUpdate('cascde')
            ->onDelete('cascade');
            $table->enum('client_interested_to_receive_screening',["Yes","No"]);
            $table->enum('client_referred_for_treatment',["Yes","No"]);
            $table->text('organisation_referred')->nulllable();
            $table->text('reason_client_was_not_referred_for_treatment')->nullable();
            $table->text('referral_comment')->nullable();
            $table->timestamps()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client_referral');
    }
};
