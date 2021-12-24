<?php

namespace App\Domains\Auth\Http\Controllers\Backend\Landing_Page;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Domains\Auth\Http\Requests\Backend\Landing_Page\DashboardViewRequest;
use App\Domains\Auth\Models\LandingPageModels\DashboardView;
use Illuminate\Support\Facades\DB;
use App\Domains\Auth\Services\PermissionService;
class DashboardViewController 
{
    public function index()
    {
        $landing_page_dashboard = DashboardView::all();
        return view('backend.auth.landing.dashboardlanding.index',[
            'landing_page_dashboard' => $landing_page_dashboard
        ]);
    }

    public function store(DashboardViewRequest $request)
    {       
            $validated = $request->validated();
           
            $landing_page_dashboard = new DashboardView;
            // $landing_page_dashboard->image_admin = $request ->input('image_admin');
            if($request->hasfile('image_admin')){
                $file= $request->file('image_admin');
                $extension = $file->getClientOriginalExtension();
                $filename = time(). '.'.$extension;
                $file->move('uploads/LandingPageImagesDashboard',$filename);
                $landing_page_dashboard->image_admin = $filename;
            }
            $landing_page_dashboard->title_admin = $request ->input('title_admin');
            $landing_page_dashboard->description_admin = $request -> input('description_admin');
            if($request->hasfile('image_user')){

                $destination = 'uploads/LandingPageImagesDashboard'.$landing_page_dashboard->image_user;
                if(File::exists($destination)){
                 File::delete($destination);
                }
                $file= $request->file('image_user');
                $extension = $file->getClientOriginalExtension();
                $filename = time(). '.'.$extension;
                $file->move('uploads/LandingPageImagesDashboard',$filename);
                $landing_page_dashboard->image_user = $filename;
            }
            $landing_page_dashboard->title_user = $request->input('title_user');
            $landing_page_dashboard->description_user = $request->input('ddescription_user');
           
            $landing_page_dashboard->save();
            return redirect()->route('admin.auth.landing.dashboardlanding.index')->withFlashSuccess(__('The Landing Page was successfully created.'));
        
     
    }

    public function edit($landing_page_dashboard_id)
    {
        $landing_page_dashboard = DashboardView::find($landing_page_dashboard_id);
        return view('backend.auth.landing.dashboardlanding.edit',compact('landing_page_dashboard'))->with([
            'landing_page_dashboard' => $landing_page_dashboard
        ]);
    }

    public function update(DashboardViewRequest $request, $landing_page_dashboard_id)
    {
       
        $landing_page_dashboard = DashboardView::find($landing_page_dashboard_id);
        
        if($request->hasfile('image_admin')){

            $destination = 'uploads/LandingPageImagesDashboard'.$landing_page_dashboard->image_admin;
            if(File::exists($destination)){
             File::delete($destination);
            }
            $file= $request->file('image_admin');
            $extension = $file->getClientOriginalExtension();
            $filename = time(). '.'.$extension;
            $file->move('uploads/LandingPageImagesDashboard',$filename);
            $landing_page_dashboard->image_admin = $filename;
        }
        

        $landing_page_dashboard->title_admin = $request ->input('title_admin');
        $landing_page_dashboard->description_admin = $request -> input('description_admin');
        if($request->hasfile('image_user')){

            $destination = 'uploads/LandingPageImagesDashboard'.$landing_page_dashboard->image_user;
            if(File::exists($destination)){
             File::delete($destination);
            }
            $file= $request->file('image_user');
            $extension = $file->getClientOriginalExtension();
            $filename = time(). '.'.$extension;
            $file->move('uploads/LandingPageImagesDashboard',$filename);
            $landing_page_dashboard->image_user = $filename;
        }
        $landing_page_dashboard->title_user = $request->input('title_user');
        $landing_page_dashboard->description_user = $request->input('description_user');
       

            $landing_page_dashboard->update();
            return redirect()->route('admin.auth.dashboardlanding.index')->withFlashSuccess(__('The Landing Page updated successfully.'));

    }

}
