<?php

namespace App\Domains\Auth\Http\Controllers\Backend\Landing_Page;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Domains\Auth\Http\Requests\Backend\Landing_Page\TabsRequest;
use App\Domains\Auth\Models\LandingPageModels\Tabs;
use Illuminate\Support\Facades\DB;
use App\Domains\Auth\Services\PermissionService;
class TabsController 
{
    public function index()
    {
        $landing_page_tabs =Tabs::all();
        return view('backend.auth.landing.tabslanding.index',[
            'landing_page_tabs' => $landing_page_tabs
        ]);
    }

    public function store(TabsRequest $request)
    {       
            $validated = $request->validated();
           
            $landing_page_tabs = new Tabs;
            $landing_page_tabs->tab1 = $request ->input('tab1');
            $landing_page_tabs->tab2 = $request ->input('tab2');
            $landing_page_tabs ->tab3 =$request->input('tab3');
            $landing_page_tabs ->tab4 =$request->input('tab4');
            $landing_page_tabs->tab1_description = $request->input('tab1_description');
            $landing_page_tabs ->tab2_description=$request->input('tab2_description');
            $landing_page_tabs->tab3_description = $request->input('tab3_description');
            $landing_page_tabs ->tab4_description=$request->input('tab4_description');
           
            $landing_page_tabs->save();
            return redirect()->route('admin.auth.landing.index')->withFlashSuccess(__('The Landing Page was successfully created.'));
        
     
    }

    public function edit($landing_page_tabs_id)
    {
        $landing_page_tabs = Tabs::find($landing_page_tabs_id);
        return view('backend.auth.landing.tabslanding.edit',compact('landing_page_tabs'))->with([
            'landing_page_tabs' => $landing_page_tabs
        ]);
    }

    public function update(TabsRequest $request, $landing_page_tabs_id)
    {
       
        $landing_page_tabs = Tabs::find($landing_page_tabs_id);
        $landing_page_tabs->tab1 = $request ->input('tab1');
            $landing_page_tabs->tab2 = $request ->input('tab2');
            $landing_page_tabs ->tab3 =$request->input('tab3');
            $landing_page_tabs ->tab4 =$request->input('tab4');
            $landing_page_tabs->tab1_description = $request->input('tab1_description');
            $landing_page_tabs ->tab2_description=$request->input('tab2_description');
            $landing_page_tabs->tab3_description = $request->input('tab3_description');
            $landing_page_tabs ->tab4_description=$request->input('tab4_description');

            $landing_page_tabs->update();
            return redirect()->route('admin.auth.tabslanding.index')->withFlashSuccess(__('The Landing Page updated successfully.'));

    }

}
