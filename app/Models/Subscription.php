<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'full_name',
        'email',
        'subscription_type',
        'lifetime',
        'price',
        'expiry_date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
