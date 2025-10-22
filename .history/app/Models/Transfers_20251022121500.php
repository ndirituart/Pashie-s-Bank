<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transfers extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    // Relationship to the sending User (Sender)
    public function sender(): BelongsTo
    {
        // Assumes 'sender_id' is the foreign key linking to the User model
        return $this->belongsTo(User::class);
    }

    // Relationship to the sending Account (Sender Account)
    public function senderAccount(): BelongsTo
    {
        // Explicitly defining the foreign key as 'sender_account_id'
        return $this->belongsTo(Account::class, 'foreignKey: sender_account_id');
    }
}
