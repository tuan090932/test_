<?php

namespace App\Services;

use Illuminate\Support\Facades\Cookie;

use App\Models\Joke;
use App\Models\Sessions;
use App\Models\Vote;
use App\Models\User;

class CookieService
{
    private Joke $content;
    private  Sessions $session_id;
    private Vote $is_like;
    private User $username;
    public function __construct(Joke $content, Sessions $session_id, Vote $is_like, User $username)
    {
        $this->content = $content;
        $this->session_id = $session_id;
        $this->is_like = $is_like;
        $this->username = $username;
    }
    public function checkCookie()
    {
        if (!isset($_COOKIE['Cookie_session_id']) || !isset($_COOKIE['count_joke'])) {
            // No user session or count_joke cookie found
            $random_id_cookie = uniqid();
            setcookie("Cookie_session_id", $random_id_cookie);
            $this->session_id->save_session_id_and_user($random_id_cookie); // Save the session ID and user
            return true;
        } else {
            //Cookie_session_id was exsited
            $joke = $this->content->find($_COOKIE['count_joke']);
            $joke_1 = $joke->content;
            return false;
        }
    }
}
