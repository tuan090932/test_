<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class User extends Model
{
    use HasFactory;

    //protected $fillable = ['username'];

    public function sessions()
    {
        return $this->hasOne(Sessions::class);
    }

    public function votes()
    {
        return $this->hasMany(Vote::class);
    }
}
