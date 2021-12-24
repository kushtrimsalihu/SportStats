<?php

namespace App\Domains\Auth\Http\Controllers\Backend\Faq;
use App\Domains\Auth\Http\Requests\Backend\Faq\FaqRequest;
use App\Domains\Auth\Models\Faq;
use App\Domains\Auth\Models\LandingPageModels\LandingPage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Artisan;


class FaqController
{
    public function index()
    {
        $faq = Faq::paginate(8);
        return view('backend.auth.faq.index')->with('faq', $faq);
    }


    public function create()
    {
        // $sports = Faq::all();
        return view('backend.auth.faq.create');
    }

    public function store(FaqRequest $request)
    {
        $faq = new Faq;
        // $faq->faq_id = $request->input('faq_id');
        $faq->questions = $request->input('questions');
        $faq->answers = $request->input('answers');
        $faq->save();
        return redirect()->route('admin.auth.faq.index')->withFlashSuccess(__('Successfully created.'));
    }

    public function edit($faq_id)
    {
        $faq = DB::table('faq')
                    ->select('faq.*')
                    ->where('faq_id', '=', $faq_id)->first();
        return view('backend.auth.faq.edit')->with('faq', $faq);
    }

    public function update(FaqRequest $request, $faq_id)
    {
        $faq = Faq::find($faq_id);
        $faq->questions = $request->input('questions');
        $faq->answers = $request->input('answers');
        $faq->save();
        return redirect()->route('admin.auth.faq.index')->withFlashSuccess(__('Updated'));
    }

    public function show($faq_id)
    {
        $faq = Faq::find($faq_id);
        if ($faq) {
            return view('backend.auth.faq.show')->with(['faq' => $faq ]);
        }
        return redirect()->route('admin.auth.faq.index')->withFlashDanger(__('Something went wrong.'));
    }

    public function destroy($faq_id)
    {
        $faq= Faq::findOrFail($faq_id);
        $faq->delete();
        return redirect()->route('admin.auth.faq.index')->withFlashSuccess(_('Removed'));
    }
}
