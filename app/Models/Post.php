<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function temas(){
        return $this->belongsTo(Tema::class,'tema');
    }
    public function user(){
        return $this->belongsTo(User::class,'autor');
    }
}
