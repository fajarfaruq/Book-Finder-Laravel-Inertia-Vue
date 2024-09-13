<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    // The table associated with the model.
    protected $table = 'books';

    // The attributes that are mass assignable.
    protected $fillable = [
        'title',
        'author',
        'genre',
        'vote_count',
    ];

    // If you don't want Laravel to manage timestamps.
    public $timestamps = true; // Set to false if you don’t want timestamps
}
