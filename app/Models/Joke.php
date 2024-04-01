<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Joke extends Model
{
    protected $fillable = ['content'];



    public function votes()
    {
        return $this->hasMany(Vote::class);
    }


    public static function getAllJokes()
    {
        $jokes = DB::table('Joke')->take(4)->get();
        return $jokes;
    }

    public static function getJokeById($id)
    {


        $joke =  DB::table('joke')->find($id);
        return $joke;
    }
}
