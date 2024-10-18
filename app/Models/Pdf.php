<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pdf extends Model
{
    use HasFactory;
    protected $fillable =[
         "pdf",
        "book_id"
    ];
    public function book () {

        return $this->belongsTo(Book::class);
    }
}
