<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Sessions extends Model
{
    protected $fillable = ['id', 'user_id', 'ip_address', 'user_agent', 'payload', 'last_activity'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function save_session_id_and_user($session_id)
    {
        $random_user_id = mt_rand(1, 9223372036854775807); // Generate a random integer within the bigint range

        DB::table('users')->insert([
            'id' => $random_user_id,
        ]);


        DB::table('session_id')->insert([
            'id' => $session_id,
            'user_id' => $random_user_id,

        ]);


        // Handle the result if needed
        // ...
    }
}
