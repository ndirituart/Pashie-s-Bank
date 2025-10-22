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
       
     Schema::create('transfers', function (Blueprint $table) {
               $table->id();
               $table->foreignId('sender_id')->nullable()->constrained('users')->onDelete('nullOnDelete'); // transfer relationship with users table
               $table->foreignId('sender_account_id')->nullable()->constrained('accounts')->onDelete('nullOnDelete'); //transfer relationshi
               $table->foreignId('recipient_account_id')->nullable()->constrained('accounts')->onDelete('nullOnDelete');
               $table->string('reference')->index()->nullable()->comment('transfers reference index');
               $table->string('status');
               $table->decimal('amount', 16, places: 4);
               $table->timestamps();
});
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transfers');
    }
};
