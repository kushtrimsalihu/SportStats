<?php
namespace App\Http\Controllers\Frontend;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

use App\Domains\Auth\Models\About;
use Illuminate\Support\Facades\DB;

class AboutController 
{
    public function index()
    {
        $about =About::all();
        return view('frontend.about',[
            'about' => $about
        ]);
    }

}