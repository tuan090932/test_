<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CookieService;

use App\Models\Joke;
use App\Models\Sessions;
use App\Models\Vote;
use App\Models\User;

class HomeController extends Controller
{
    //
    private Joke $content;
    private  Sessions $session_id;
    private Vote $is_like;
    private User $username;
    private CookieService $CookieService;
    public function __construct(Joke $content, Sessions $session_id, Vote $is_like, User $username, CookieService  $CookieService)
    {
        $this->content = $content;
        $this->session_id = $session_id;
        $this->is_like = $is_like;
        $this->username = $username;
        $this->CookieService = $CookieService;
    }
    public function gethome()
    {
        if (isset($_COOKIE['count_joke']) && $_COOKIE['count_joke'] >= 5) {
            $joke = "That's all the jokes for today! Come back another day!";
            return view('welcome', compact('joke'));
        }
        // Check if the user's cookie exists, indicating they are an existing user
        if ($this->CookieService->checkCookie() == true) {
            //new user
            $count_joke = 1;
            setcookie("count_joke", $count_joke);
            $count_joke_value = $_COOKIE['count_joke'] ?? 1; // The default value is 1 if the key does not exist
            $joke = $this->content->find($count_joke_value);
            $joke = $joke->content;
            return view('welcome', compact('joke'));
        } else {
            $_COOKIE['count_joke'];
            $joke = $this->content->find($_COOKIE['count_joke']);
            $joke = $joke->content;
            return view('welcome', compact('joke'));
        }
    }
    public function process_vote(Request $request)
    {
        if (isset($_COOKIE['count_joke']) && $_COOKIE['count_joke'] >= 5) {
            return redirect()->route('home');
        }

        if ($this->CookieService->checkCookie() == true) {
            return redirect()->route('home');
        }
        $vote = $request->input('vote');
        $count_joke = $_COOKIE['count_joke'];
        $count_joke++;
        setcookie("count_joke", $count_joke);
        $this->is_like->save_into_database($_COOKIE['count_joke'], $_COOKIE['Cookie_session_id'], $vote);
        if ($count_joke >= 5) {
            $joke = "That's all the jokes for today! Come back another day!";
            return view('welcome', compact('joke'));
        }
        return redirect()->route('home');
        // This will output the value of the 'vote' parameter submitted with the form
    }
}
