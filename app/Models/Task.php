<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo; // Add this import!

class Task extends Model
{
    protected $fillable = [
        'title', 
        'description', 
        'status', 
        'is_priority', 
        'due_date', 
        'category_id', 
        'user_id'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}