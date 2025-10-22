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

    //1:1 relationship of Account to User
    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    //1:
    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class);
    }
}
