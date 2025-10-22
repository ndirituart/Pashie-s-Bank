<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Accounts extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    // Define the inverse of the one-to-many relationship (Account belongs to a User)
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
