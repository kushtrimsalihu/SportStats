<?php

namespace App\Domains\Auth\Http\Controllers\Backend\UpdateInformation;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Domains\Auth\Http\Requests\Backend\UpdateInformation\UpdateInformationRequest;
use App\Domains\Auth\Models\UpdateInformation;
use Illuminate\Support\Facades\DB;
use App\Domains\Auth\Services\PermissionService;

class UpdateInformationController
{
    public function index()
    {
        $updateinformation = UpdateInformation::all();
        return view('backend.auth.updateinformation.index',[
            'updateinformation' => $updateinformation
        ]);
    }

    // public function create()
    // {
    //     $landing_page = LandingPage::all();
    //     return view('backend.auth.landing.create')->with('landing', $landing_page);
    // }

    public function store(UpdateInformationRequest $request)
    {       
            $validated = $request->validated();
           
            $updateinformation = new UpdateInformatio;
            if($request->hasfile('icon'))
        {
            $file = $request->file('icon');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/logo/', $filename);
            $updateinformation->icon = $filename;
        }
            $updateinformation->save();
            return redirect()->route('admin.auth.updateinformation.index')->withFlashSuccess(__('Logo was successfully created.'));
        
     
    }

    public function edit($id)
    {
        $updateinformation = UpdateInformation::find($id);
        return view('backend.auth.updateinformation.edit')->with([
            'updateinformation' => $updateinformation
        ]);
    }

    public function update(Request $request, $id)
    {
        $updateinformation = UpdateInformation::find($id);
        if($request->hasfile('icon'))
        {
            $destination = 'uploads/logo/'.$updateinformation->icon;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $file = $request->file('icon');
            $extention = $file->getClientOriginalExtension();
            // $filename = time().'.'.$extention;
            $filename = "applogo".'.'.$extention;
            $file->move('uploads/logo', $filename);
            $updateinformation->icon = $filename;
        }
            $updateinformation->update();
            return redirect()->route('admin.auth.updateinformation.index')->withFlashSuccess(__('Logo updated successfully.'));

    }
    public function show($id)
    {
        $updateinformation = UpdateInformation::find($id);
        if ($updateinformation) {
            return view('backend.auth.updateinformation.show')->with([
                'updateinformation' => $updateinformation
            ]);
        }
        return redirect()->route('admin.auth.updateinformation.index')->withFlashDanger('Failed to find logo');
    }

    // public function destroy($id)
    // {
    //     $posts = DB::table('updateinformation')->where('id', $id)->delete();
    //     if($updateinformation){
    //         return redirect()->route('admin.auth.updateinformation.index')->withFlashSuccess('logo Removed');
    //     }
    //     return redirect('/backend.auth.updateinformation.index')->withFlashDanger('Fail');
    // }
}
