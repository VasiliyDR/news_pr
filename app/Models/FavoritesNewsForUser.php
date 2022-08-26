<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavoritesNewsForUser extends Model
{
    use HasFactory;
    protected $table = 'favorites_news_for_users';
    protected $guarded = false;
}
