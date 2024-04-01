<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Vote extends Model
{
    protected $fillable = ['user_id', 'joke_id', 'is_like'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function joke()
    {
        return $this->belongsTo(Joke::class);
    }

    public function save_into_database($id_joke, $session_id, $is_like)
    {
        if ($is_like == "funny") {
            $is_like =   true;
        } else {
            $is_like =   false;
        }
        // dd($session_id);

        $user_id = DB::table('session_id')
            ->where('id', $session_id)
            ->value('user_id');

        DB::table('votes')->insert([
            'is_like' => $is_like,
            'user_id' => $user_id,
            'joke_id' => $id_joke,
        ]);


        // Handle the result if needed
        // ...
    }
}
