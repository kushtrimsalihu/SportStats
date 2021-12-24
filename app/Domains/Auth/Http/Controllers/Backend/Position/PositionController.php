<?php
namespace App\Domains\Auth\Http\Controllers\Backend\Position;
use App\Domains\Auth\Http\Requests\Backend\Position\StorePositionRequest;
use Illuminate\Http\Request;
use App\Domains\Auth\Models\Position;
use App\Domains\Auth\Models\Sports;
use App\Domains\Auth\Services\PermissionService;

class PositionController
{

    public function index()
    {
        $position = Position::with('sports')->paginate(8);
        return view('backend.auth.position.index')->with('position', $position);
    }

    public function create()
    {
        $sports = Sports::all();
        return view('backend.auth.position.create')->with('sports', $sports);
    }

    public function store(StorePositionRequest $request)
    {
        $sport = Position::findOrFail($request->input('sport'));
        if ($sport) {
            $position = new Position;
            $position->position_type = $request->input('position_type');
            $position->sport = $request->input('sport');
            $position->save();
            return redirect()->route('admin.auth.position.index')->withFlashSuccess(__('The Position was successfully created.'));
        }
        return redirect()->route('admin.auth.position.index')->withFlashDanger(__('Cannot find sport.'));
    }

    public function edit($position_id)
    {
        $position = Position::find($position_id);
        $sports = Sports::all();
        return view('backend.auth.position.edit')->with([
            'position' => $position,
            'sports' => $sports
        ]);
    }

    public function update(StorePositionRequest $request, $position_id)
    {
        $sport = Sports::find($request->input('sport'));
        if ($sport) {
            $position = Position::findOrFail($position_id);
            $position->position_type = $request->input('position_type');
            $position->sport = $request->input('sport');
            $position->save();
            return redirect()->route('admin.auth.position.index')->withFlashSuccess(__('Position Updated'));
        }
        return redirect()->route('admin.auth.position.index')->withFlashDanger(__('Cannot find sport.'));
    }

    public function show($position_id)
    {
        $position = Position::with('sports')->find($position_id);
        if ($position) {
            return view('backend.auth.position.show')->with(['position' => $position]);
        } 
        return redirect()->route('admin.auth.position.index')->withFlashDanger(__('Cannot find position.'));
    }

    public function destroy($position_id)
    {
        $position = Position::findOrFail($position_id);
        $position->delete();
        return redirect()->route('admin.auth.position.index')->withFlashSuccess(_('Position Removed'));
    }
}