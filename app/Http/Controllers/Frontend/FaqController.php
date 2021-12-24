<?php

namespace App\Http\Controllers\Frontend;
use Illuminate\Support\Facades\DB;


/**
 * Class HomeController.
 */
class FaqController
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $FaqList = DB::table('faq')
        ->select('faq.*')
        ->get();
        return view('frontend.faq',[
            'faqs' => $FaqList
        ]);
        return view('frontend.faq');
    }
}
