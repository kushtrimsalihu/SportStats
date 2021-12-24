<?php

namespace App\Http\Controllers\Frontend\User;
use Illuminate\Support\Facades\DB;


/**
 * Class LivescoreController.
 */
class LivescoreController
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */

    public function livescore(){
        return view('frontend.user.livescore');
    }
}