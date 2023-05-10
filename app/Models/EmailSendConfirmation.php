<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailSendConfirmation extends Model
{
    use HasFactory;

    protected $fillable = [
        'subscription_id',
        'post_id',
        'is_confirmed',
    ];

    public function subscription()
    {
        return $this->belongsTo(Subscription::class);
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
