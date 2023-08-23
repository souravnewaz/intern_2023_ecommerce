<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function getShortDescriptionAttribute()
    {
        return Str::limit($this->attributes['description'], 100);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
