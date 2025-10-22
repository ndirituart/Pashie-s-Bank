<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transactions extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    // 1:M of one User to many Transactions
    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'foreignKey: user_id'); 
    }

    //M:1 of many Transactions to one Account
    public function account(): BelongsTo
    {
        // Assumes 'account_id' is the foreign key linking to the Account model
        return $this->belongsTo(Accounts::class, 'foreignKey: account_id');
    }
}
