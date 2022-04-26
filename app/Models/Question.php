<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Question extends Model
{
    use HasFactory;

    public function getIsAuthorAttribute()
    {
        return Auth::id() === $this->user_id;
    }

    public function getShortDescriptionAttribute()
    {
        return substr($this->description, 0, 250);
    }

    public function getAnswersAttribute()
    {
        // return DB::select("select * from questions where question_id=$this->id");
        return DB::select("select * from questions where question_id = ?", [$this->id]);
    }
}
