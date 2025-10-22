<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transactions extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    // 1:M of one 
    public function owner(): BelongsTo
    {
        // Assumes 'user_id' is the foreign key linking to the User model
        return $this->belongsTo(User::class, 'foreignKey: user_id'); 
    }

    // Define the inverse one-to-many relationship (Transaction belongs to an Account)
    public function account(): BelongsTo
    {
        // Assumes 'account_id' is the foreign key linking to the Account model
        return $this->belongsTo(Account::class, 'foreignKey: account_id');
    }
}
