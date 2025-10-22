<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Accounts extends Model
{
    use HasFactory, SoftDeletes;

    //protect assignend values
    protected $guarded = [];

    //1:1 relationship of 
    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Define the one-to-many relationship (Account has many Transactions)
    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class);
    }
}
