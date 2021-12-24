<?php
namespace App\Domains\Auth\Http\Controllers\Backend\Livescore;
use App\Domains\Auth\Http\Requests\Backend\Livescore\LivescoreRequest;
use Illuminate\Http\Request;
use App\Domains\Auth\Models\Livescore;
use App\Domains\Auth\Services\PermissionService;
use Illuminate\Support\Facades\Artisan;

class LivescoreController
{

    public function index()
    {
        $livescore = Livescore::orderBy('id', 'DESC')->get();
        return view('backend.auth.livescore.index')->with('livescore', $livescore);
    }

    public function create()
    {
        $livescore = Livescore::all();
        return view('backend.auth.livescore.create')->with('livescore', $livescore);
    }

    public function updateLivescore()
    {
        Artisan::call('command:update_livescore');
        return redirect()->route('admin.auth.livescore.index')->withFlashSuccess(__('Livescore updated successfully.'));
    }

    public function addLivescore(){
        Artisan::call('command:add_livescore');
        return redirect()->route('admin.auth.livescore.index')->withFlashSuccess(__('Livescore refreshed successfully.'));
   
    }

}