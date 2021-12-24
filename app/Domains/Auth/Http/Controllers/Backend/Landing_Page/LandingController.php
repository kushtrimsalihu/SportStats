<?php

namespace App\Domains\Auth\Http\Controllers\Backend\Landing_Page;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Domains\Auth\Http\Requests\Backend\Landing_Page\LandingPageRequest;
use App\Domains\Auth\Models\LandingPageModels\LandingPage;
use Illuminate\Support\Facades\DB;
use App\Domains\Auth\Services\PermissionService;
class LandingController
{
    public function index()
    {
        $landing_page = LandingPage::all();
        return view('backend.auth.landing.index',[
            'landing_page' => $landing_page
        ]);
    }


    // public function create()
    //  {
    //      $landing_page = LandingPage::all();
    //      return view('backend.auth.landing.create')->with('landing', $landing_page);
    // }

    public function store(LandingPageRequest $request)
    {
            $validated = $request->validated();

            $landing_page = new LandingPage;
            $landing_page->title = $request ->input('title');
            $landing_page->description = $request->input('description');
            if($request->hasfile('image')){
                $file= $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = time(). '.'.$extension;
                $file->move('uploads/LandingPageImages',$filename);
                $landing_page->image = $filename;
            }
            $landing_page ->title_cards=$request->input('title_cards');
            $landing_page ->title_description=$request->input('description_cards');
            $landing_page->save();
            return redirect()->route('admin.auth.landing.index')->withFlashSuccess(__('The Landing Page was successfully created.'));


    }

    public function edit($landing_page_id)
    {
        $landing_page = LandingPage::find($landing_page_id);
        return view('backend.auth.landing.edit',compact('landing_page'))->with([
            'landing_page' => $landing_page
        ]);
    }

    public function update(LandingPageRequest $request, $landing_page_id)
    {

            $landing_page = LandingPage::find($landing_page_id);
            $landing_page->title = $request ->input('title');
            $landing_page->description = $request->input('description');
            if($request->hasfile('image')){

                $destination = 'uploads/LandingPageImages'.$landing_page->image;
                if(File::exists($destination)){
                 File::delete($destination);
                }
                $file= $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = time(). '.'.$extension;
                $file->move('uploads/LandingPageImages',$filename);
                $landing_page->image = $filename;
            }

            $landing_page->update();
            return redirect()->route('admin.auth.landing.index')->withFlashSuccess(__('The Landing Page updated successfully.'));

    }
    public function show($landing_page_id)
    {
        $landing_page = LandingPage::find($landing_page_id);
        if ($landing_page) {
            return view('backend.auth.landing.show')->with(['landing_page' => $landing_page]);
        }
        return redirect()->route('admin.auth.landing.index')->withFlashDanger(__('Cannot find.'));
    }

    public function destroy($landing_page_id)
    {
        $landing_page = LandingPage::findOrFail($landing_page_id);
        $landing_page->delete();
        return redirect()->route('admin.auth.landing.index')->withFlashSuccess(_('Landing Page Removed'));
    }
}
