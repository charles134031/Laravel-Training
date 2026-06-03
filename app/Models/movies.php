<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory; 
use Illuminate\Database\Eloquent\Model;

class movies extends Model
{
          use HasFactory;
          protected $table = 'movies';
          protected $fillable = [
        'title',
        'description',
        'synopsis',
        'author_id',
        'cover_image'
       
    ];

    public function author(){
         return $this->belongsTo(author::class, 'author_id');
    }
}
