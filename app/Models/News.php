<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $table = 'news';
    protected $guarded = false;

    public function city() {
        return $this->belongsTo(City::class, 'city_id','id');
    }
    public function popularNews() {
        return $this->belongsToMany(User::class, 'favorites_news_for_users', 'news_id', 'user_id');
    }
    public function type() {
        return $this->belongsTo(Type::class, 'type_id', 'id');
    }
}
