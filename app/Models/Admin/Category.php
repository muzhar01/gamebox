<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['title','description','thumbnail'];

    public function scopeActive($q){
        return $q->whereStatus(1);
    }

    public function games(){
        return $this->hasMany(\App\Models\Game::class);
    }

}
