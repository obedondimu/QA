<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }

    // protected $table = "comments";

    public function question()
    {
        return $this->belongsTo(Question::class );        
       
    }

    public function reactions()
    {
        return $this->hasMany(Reaction::class);
    }
}
