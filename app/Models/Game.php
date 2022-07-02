<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'short_name', 'description', 'category_id', 'status'];

    public function scopeActive($q){
        return $q->whereStatus(1);
    }

    
    // Get title wrt language
    public function getTitleAttribute($value){

        $lang = session()->get('lang') ?? 'en';
        $is_admin = session()->has('ADMIN_LOGIN');

        if($lang == 'ar' && !$is_admin){
            return $this->ar_title ?? $value;
        }
        
        return $value;
    }
    // get desctription wrt language
    public function getDescriptionAttribute($value){

        $lang = session()->get('lang') ?? 'en';
        $is_admin = session()->has('ADMIN_LOGIN');

        if($lang == 'ar' && !$is_admin){
            return $this->ar_description ?? $value;
        }

        return $value;
    }

}
