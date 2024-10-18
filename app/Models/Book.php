<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable =[
        "description",
        "author_id",
    ];
    public function author () {

        return $this->belongsTo(Author::class);
    }
    public function images () {
        return $this->hasMany(Image::class);
    }
    public function pdfs () {
        return $this->hasMany(Pdf::class);
    }
}
