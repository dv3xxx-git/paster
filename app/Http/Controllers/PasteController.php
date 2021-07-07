<?php

namespace App\Http\Controllers;

use App\Http\Requests\PasteRequest;
use App\Models\Paste;
use App\Services\HashService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PasteController extends Controller
{
    public function index()
    {
        $pastes = Paste::whereAcceptTimer(0)->whereAcceptPublic(0)
            ->orderByRaw('created_at DESC')
            ->get();

        return view('pastes', compact('pastes'));
    }

    public function store(PasteRequest $request, Paste $paste)
    {
        $timer = [
            1 => '10 minutes',
            2 => '1 hours',
            3 => '3 hours',
            4 => '1 days',
            5 => '1 week',
            6 => '1 months',
        ];


        $paste->fill($request->validated());
        if ($request->timer != '0') {
            $paste->timer = Carbon::now()->add($timer[$request->timer]);
        }
        if (Auth::user()){
            $paste->user_id = Auth::user()->id;
        }
        $paste->save();

        $hash = HashService::createHash($paste->id);
        $paste->update(['hash' => $hash]);
        return redirect('paste')->with(['new_paste' => $paste]);
    }

    public function show($hash)
    {
        $paste = Paste::whereHash($hash)->first();
        
        return view('show', compact('paste'));
    }
}
