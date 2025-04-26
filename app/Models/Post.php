<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    protected $fillable=["title","body","image"];
    use SoftDeletes;
    

public function user()
{
    return $this->belongsTo(User::class);
}

}
