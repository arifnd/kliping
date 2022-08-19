<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Source extends Model
{
    use HasFactory;

    /**
     * Get the news for the sources.
     */
    public function news()
    {
        return $this->hasMany(News::class);
    }

    /**
     * Get the type that owns the sources.
     */
    public function type()
    {
        return $this->belongsTo(Type::class);
    }
}
