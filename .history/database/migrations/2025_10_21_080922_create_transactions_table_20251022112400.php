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
        Schema::create('transactions', function (Blueprint $table) {
           $table->id();
           $table->string('reference')->index()->unique()->comment('transaction reference index');
           $table->string('reference')->index()->unique()->comment('transaction reference index');
           $table->string('reference')->index()->unique()->comment('transaction reference index');
           $table->string('reference')->index()->unique()->comment('transaction reference index');
           $table->string('reference')->index()->unique()->comment('transaction reference index');
           $table->string('reference')->index()->unique()->comment('transaction reference index');
    $table->foreignId('user_id')->constrained('users');
    $table->foreignId('account_id')->constrained('accounts');
    $table->foreignId('transfer_id')->nullable()->constrained('transfers');
    $table->decimal('amount', 16, 4);
    $table->decimal('balance', 16, 4);
    $table->string('category')->default('deposit');
    $table->boolean('confirmed')->default(false)->nullable(); //status
    $table->string('description')->nullable(); //withdrawal or deposit description
    $table->dateTime('date')->nullable();
    $table->dateTime('meta')->nullable();
    $table->softDeletes();
    $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
