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
            $table->foreignId('sender_id')->nullable()->constrained('users');// transfer relationship with users table
               //->onDelete('nullOnDelete'); removed so that we use softdelet trait
               $table->foreignId('sender_account_id')->nullable()->constrained('accounts'); //transfer relationship with accounts table
               $table->foreignId('recipient_account_id')->nullable()->constrained('accounts'); //transfer relationship with accounts table
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
