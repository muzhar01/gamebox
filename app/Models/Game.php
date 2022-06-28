<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'short_name', 'description', 'start_path', 'category_id', 'status'];

    public function scopeActive($q){
        return $q->whereStatus(1);
    }

}
