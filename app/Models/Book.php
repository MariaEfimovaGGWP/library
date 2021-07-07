<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'book_name',
        'description',
        'img',
        'author_id',
    ];

    public function readers()
    {
        return $this->hasMany(Reader::class);

    }

    public function author()
    {
        return $this->belongsTo(Author::class);
    }
}
