<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\Transactions;
use App\Models\Transfers;
use App\Models\Accounts;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
   protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // 1:M Relationship where a User has many Transactions
public function transactions(): HasMany
{
    return $this->hasMany(Transactions::class);
}

// Relationship where a User has many Transfers (as the sender)
public function transfer(): HasMany
{
    // The second argument 'sender' explicitly tells Laravel to look for the 'sender' foreign key in the 'transfers' table.
    return $this->hasMany(Transfers::class, 'sender');
}

// Relationship where a User has one Account (Main Account)
public function account(): HasOne
{
    // The second argument 'user_id' explicitly tells Laravel to look for the 'user_id' foreign key in the 'accounts' table.
    return $this->hasOne(Accounts::class, 'user_id');
}
}
