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
        Schema::create('notifications', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id('notification_id');
            $table->foreignId('transaction_id')
                    ->constrained('transactions', 'transaction_id')
                    ->onDelete('cascade');
            // $table->unsignedBigInteger('transaction_id');
            // $table->foreign('transaction_id')->references('transaction_id')->on('transactions')->onDelete("cascade");
            $table->string('sent_to');
            $table->string('sent_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
