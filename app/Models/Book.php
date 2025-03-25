<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    /** @use HasFactory<\Database\Factories\BookFactory> */
    use HasFactory;

    protected $fillable = [
        'cover_path', 
        'title', 
        'author',
        'genres',
        'total_pages',
        'first_publish', 
        'synopsis'
    ];
    
    public function reviews(){
        return $this->hasMany(Review::class);
    }

    public function getTotalRating(){
        return $this->reviews()->avg('rating') ?? 0;
    }
}
