<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;
use App\Models\Account;

class Transfers extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    // 1:M of one User to many Transfers
    public function sender(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // 1 
    public function senderAccount(): BelongsTo
    {
        // Explicitly defining the foreign key as 'sender_account_id'
        return $this->belongsTo(Account::class, 'foreignKey: sender_account_id');
    }
}
