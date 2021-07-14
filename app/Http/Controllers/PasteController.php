<?php

namespace App\Http\Controllers;

use App\Http\Requests\PasteRequest;
use App\Models\Paste;
use App\Services\HashService;
use Carbon\Carbon;
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
        return view('hash', compact('paste'));
    }

    public function show($hash)
    {
        $paste = Paste::whereHash($hash)->whereAcceptTimer(0)->first();
        if ($paste->accept_public == 'private'){
            if (!Auth::user()){
                abort(401,'Войдите пожалуйста');
            }
            if (!(Auth::user()->id == $paste->user_id)){
                abort(403, 'Это не твоя паста дружище');
            }
        }
        
        return view('show', compact('paste'));
    }

    public function userPastes()
    {
        $user_id = Auth::user()->id;
        $pastes = Paste::whereUserId($user_id)->whereAcceptPublic(0)->orWhere('accept_public',2)->paginate(4);
        return view('user_paste', compact('pastes'));
    }
}
