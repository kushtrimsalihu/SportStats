<?php

namespace App\Domains\Auth\Http\Controllers\Backend\About;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Domains\Auth\Http\Requests\Backend\Landing_Page\AboutusRequest;
use App\Domains\Auth\Models\LandingPageModels\AboutUs;

use App\Domains\Auth\Http\Requests\Backend\About\AboutRequest;
use App\Domains\Auth\Models\About;
use Illuminate\Support\Facades\DB;
use App\Domains\Auth\Services\PermissionService;
class AboutController 
{
    public function index()
    {
        $about =About::all();
        return view('backend.auth.about.index',[
            'about' => $about
        ]);
    }

    public function store(AboutRequest $request)
    {       
            $validated = $request->validated();
           
            $about = new About;
            $about->title_aboutus = $request ->input('title_aboutus');
            $about->description_aboutus = $request ->input('description_aboutus');
            $about ->title_cards=$request->input('title_cards');
            $about ->title_description=$request->input('description_cards');
            $about->title2_cards = $request->input('title2_cards');
            $about ->title2_description=$request->input('description2_cards');
            $about->title3_cards = $request->input('title3_cards');
            $about ->title3_description=$request->input('description3_cards');
            $about->tab1 = $request ->input('tab1');
            $about->tab2 = $request ->input('tab2');
            $about ->tab3 =$request->input('tab3');
            $about ->tab4 =$request->input('tab4');
            $about ->offer =$request->input('offer');
            $about ->offer_description =$request->input('offer_description');    
            $about->tab1_description = $request->input('tab1_description');
            $about ->tab2_description=$request->input('tab2_description');
            $about->tab3_description = $request->input('tab3_description');
            $about ->tab4_description=$request->input('tab4_description');
            $about ->confused_features=$request->input('confused_features');
            $about ->trial_days=$request->input('trial_days');

            $about->save();
            return redirect()->route('admin.auth.about.index')->withFlashSuccess(__('The About Page was successfully created.'));
        
     
    }

    public function edit($about_id)
    {
        $about = About::find($about_id);
        return view('backend.auth.about.edit',compact('about'))->with([
            'about' => $about
        ]);
    }

    public function update(AboutRequest $request, $about_id)
    {
       
        $about = About::find($about_id);
        $about->title_aboutus = $request ->input('title_aboutus');
        $about->description_aboutus = $request ->input('description_aboutus');
        $about ->title_cards=$request->input('title_cards');
        $about ->description_cards=$request->input('description_cards');
        $about->title2_cards = $request->input('title2_cards');
        $about ->description2_cards=$request->input('description2_cards');
        $about->title3_cards = $request->input('title3_cards');
        $about ->description3_cards=$request->input('description3_cards');
        $about->tab1 = $request ->input('tab1');
        $about->tab2 = $request ->input('tab2');
        $about ->tab3 =$request->input('tab3');
        $about ->tab4 =$request->input('tab4');
        $about ->offer =$request->input('offer');
        $about ->offer_description =$request->input('offer_description');
        $about->tab1_description = $request->input('tab1_description');
        $about ->tab2_description=$request->input('tab2_description');
        $about->tab3_description = $request->input('tab3_description');
        $about ->tab4_description=$request->input('tab4_description');
        $about ->confused_features=$request->input('confused_features');
        $about ->trial_days=$request->input('trial_days');
       

            $about->update();
            return redirect()->route('admin.auth.about.index')->withFlashSuccess(__('The About Page updated successfully.'));

    }

}
