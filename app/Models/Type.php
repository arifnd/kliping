<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Type extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Get the sources for the type.
     */
    public function sources()
    {
        return $this->hasMany(Source::class);
    }

    /**
     * Get the news.
     */
    public function news()
    {
        return $this->hasOneThrough(News::class, Sources::class);
    }
}
