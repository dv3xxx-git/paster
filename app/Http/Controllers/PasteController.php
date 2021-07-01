<?php

namespace App\Http\Controllers;

use App\Models\Paste;
use App\Services\FileService;
use Illuminate\Http\Request;

class PasteController extends Controller
{
    public function index()
    {
        $pastes = Paste::whereAcceptTimer(0)->whereAcceptPublic(0)->paginate(10);
        return view('home', compact('pastes'));
    }

    public function store(Request $request)
    {

        $chat_message['files'] = FileService::fileCreator($request->text);
        return redirect('/');
    }
}
