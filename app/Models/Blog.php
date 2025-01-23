<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $table = 'blogs';
    protected $fillable = [
        'no',
        'title',
        'image',
        'description'
    ];
    public function comment(){
        return
        $this->hasMany(Comment::class);
    }
    public function user(){
        return
        $this->hasMany(User::class);
    }
}
