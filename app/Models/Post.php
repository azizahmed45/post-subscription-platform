<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'website_id',
    ];

    protected $dispatchesEvents = [
        'created' => \App\Events\PostCreated::class,
    ];

    public function website()
    {
        return $this->belongsTo(Website::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
