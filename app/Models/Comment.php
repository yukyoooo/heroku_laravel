<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'book_app_id',
        'name',
        'comment',
    ];
    public function slide()
    {
        return $this->belongsTo('App\Models\bookApp');
    }

}
