<?php

namespace App\Http\Controllers;

use App\Download;
use App\File;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Storage;

class FrontEndController extends Controller
{
    public function home()
    {
        $files = File::orderBy('id', 'desc')->paginate(12);

        return view('home', compact('files'));
    }

    public function view($id)
    {
        $file = File::find($id);

        return view('admin.view', compact('file'));
    }

    public function download($id)
    {
        if (!auth()->check()) {
            return redirect()->route('homepage')->withError('PLease log in or sign up to download this file');
        }
        $file = File::find($id);
        $download = new Download;
        $download->user_id = auth()->user()->id;
        $download->file_id = $file->id;
        $download->ref = strtoupper(str_random(8));
        $download->save();

        return response()->download(storage_path() . $file->url);

    }
}
