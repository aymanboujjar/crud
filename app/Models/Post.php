<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable =[
        "description",
        "author_id",
    ];
    public function author () {

        return $this->belongsTo(Author::class);
    }
    public function imagess () {
        return $this->hasMany(Images::class);
    }
}
