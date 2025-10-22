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

    // 1:M of one User to each Transfer
    public function sender(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // 1:1 Relationship btn Sender Account and their unique ID
    public function senderAccount(): BelongsTo
    {
        return $this->belongsTo(Accounts::class, 'foreignKey: sender_account_id');
    }

    // 1:M of one User to many Transfers
    public function recepient(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // 1:1 Relationship to the sending Account (Sender Account)
    public function recipientAccount(): BelongsTo
    {
        return $this->belongsTo(Accounts::class, 'foreignKey: sender_account_id');
    }
}
