<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    use HasFactory;

    public function user()// Один к одому
    {
        return $this->belongsTo(User::class);
    }
    public function userInfoMany()// многие к одному
    {
        return $this->belongsTo(User::class);
    }
    public function userInfoManyMany()// Многие к многим
    {
        return $this->belongsToMany(User::class);
    }
}
