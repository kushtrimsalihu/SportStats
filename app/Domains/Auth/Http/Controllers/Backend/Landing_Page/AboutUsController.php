<?php

namespace App\Domains\Auth\Http\Controllers\Backend\Landing_Page;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Domains\Auth\Http\Requests\Backend\Landing_Page\AboutusRequest;
use App\Domains\Auth\Models\LandingPageModels\AboutUs;
use Illuminate\Support\Facades\DB;
use App\Domains\Auth\Services\PermissionService;
class AboutUsController 
{
    public function index()
    {
        $landing_page_about =AboutUs::all();
        return view('backend.auth.landing.aboutlanding.index',[
            'landing_page_about' => $landing_page_about
        ]);
    }

    public function store(AboutUsRequest $request)
    {       
            $validated = $request->validated();
           
            $landing_page_about = new AboutUs;
            $landing_page_about->title_aboutus = $request ->input('title_aboutus');
            $landing_page_about->description_aboutus = $request ->input('description_aboutus');
            $landing_page_about ->title_cards=$request->input('title_cards');
            $landing_page_about ->title_description=$request->input('description_cards');
            $landing_page_about->title2_cards = $request->input('title2_cards');
            $landing_page_about ->title2_description=$request->input('description2_cards');
            $landing_page_about->title3_cards = $request->input('title3_cards');
            $landing_page_about ->title3_description=$request->input('description3_cards');
           
            $landing_page_about->save();
            return redirect()->route('admin.auth.landing.index')->withFlashSuccess(__('The Landing Page was successfully created.'));
        
     
    }

    public function edit($landing_page_about_id)
    {
        $landing_page_about = AboutUs::find($landing_page_about_id);
        return view('backend.auth.landing.aboutlanding.edit',compact('landing_page_about'))->with([
            'landing_page_about' => $landing_page_about
        ]);
    }

    public function update(AboutUsRequest $request, $landing_page_about_id)
    {
       
        $landing_page_about = AboutUs::find($landing_page_about_id);
        $landing_page_about->title_aboutus = $request ->input('title_aboutus');
        $landing_page_about->description_aboutus = $request ->input('description_aboutus');
        $landing_page_about ->title_cards=$request->input('title_cards');
        $landing_page_about ->description_cards=$request->input('description_cards');
        $landing_page_about->title2_cards = $request->input('title2_cards');
        $landing_page_about ->description2_cards=$request->input('description2_cards');
        $landing_page_about->title3_cards = $request->input('title3_cards');
        $landing_page_about ->description3_cards=$request->input('description3_cards');

            $landing_page_about->update();
            return redirect()->route('admin.auth.aboutlanding.index')->withFlashSuccess(__('The Landing Page updated successfully.'));

    }

}
