<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class event extends Model
{
    use HasFactory;
    protected $fillable =[
        "name",
        "description",
        "image",
        "utulisateure_id"
    ];
    public function utilisateur(){
        return $this->belongsTo(utulisateure::class);
    }
   
}
