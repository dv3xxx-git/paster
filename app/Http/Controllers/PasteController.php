<?php

namespace App\Http\Controllers;

use App\Http\Requests\PasteRequest;
use App\Models\Paste;
use App\Services\HashService;
use Illuminate\Http\Request;


class PasteController extends Controller
{
    public function index()
    {
        $pastes = Paste::whereAcceptTimer(0)->whereAcceptPublic(0)
            ->orderByRaw('created_at DESC')
            ->paginate(10);

        return view('pastes', compact('pastes'));
    }

    public function store(PasteRequest $request, Paste $paste)
    {
        $paste->fill($request->validated());
        $paste->save();

        $hash = HashService::createHash($paste->id);
        $paste->update(['hash' => $hash]);

        return redirect('paste');
    }

    public function show($hash)
    {
        return  dd(1);
    }
}
