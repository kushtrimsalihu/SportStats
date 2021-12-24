<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vote;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class VoteController extends Controller
{
    public function store($id)
    {
        $dailyvote = DB::table('dailyvote')->latest('created_at')->first();
        $user = Auth::id();
        if ($dailyvote) {
            $vote = new Vote;
            $vote->user = $user;
            $vote->daily_vote = $dailyvote->id;
            $vote->team = $id;
            $vote->save();
            return redirect()->route('frontend.user.dashboard');
        }
        return redirect()->route('frontend.user.dashboard');
    }
}
