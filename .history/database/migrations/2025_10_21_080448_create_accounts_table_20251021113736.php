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
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->nullable()->onDelete('cascade'); //relationship between user and accounts table
            $table->string('account_number')->unique();
            $table->decimal('balance', 16, 4)->default(0);
            $table->timestamps();
            $table->softDeletes(); //this is a trait that allows for soft deleting records
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accounts');
    }
};
