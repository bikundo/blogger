<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\User;
use App\Download;
use App\File;
use Yajra\Datatables\Datatables;
use Storage;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function getUsers()
    {
        return view('admin.users');
    }

    public function uploadFile()
    {
        return view('admin.upload');
    }

    public function getDownloads()
    {
        return view('admin.downloads');
    }

    public function getFiles()
    {
        return view('admin.files');
    }

    public function upload(Request $request)
    {
        $this->validate($request, [
            'name'        => 'required|max:255',
            'description' => 'required|min:10',
            'file'        => 'required',
        ]);
        $data = $request->except('_token', 'file');
        $data['url'] = $this->doUpload($request);
        $file = New File;
        $file->fill($data);
        $file->save();

        return redirect()->route('datatables.get.files')->withSuccess('File uploaded successfully');
    }

    private function doUpload($request)
    {
        $now = Carbon::now()->toDayDateTimeString();
        $path = 'files/' . str_slug($now) . '-' . $request->file('file')->getClientOriginalName();
        Storage::put(
            $path,
            file_get_contents($request->file('file')->getRealPath())
        );

        return '/app/' . $path;
    }

    public function allUsers()
    {
        return Datatables::of(User::query())
            ->addColumn('date', function ($user) {
                return $this->cleanDate($user->created_at);
            })
            ->make(TRUE);
    }

    public function allFiles()
    {
        return Datatables::of(File::with('dloads')->orderBy('id', 'desc'))
            ->addColumn('date', function ($file) {
                return $this->cleanDate($file->created_at);
            })
            ->addColumn('downloads', function ($file) {
                return $file->dloads->count();
            })
            ->make(TRUE);
    }

    public function allDownloads()
    {
        return Datatables::of(Download::with('file', 'user'))
            ->addColumn('date', function ($download) {
                return $this->cleanDate($download->created_at);
            })
            ->make(TRUE);
    }

    private function cleanDate($date)
    {
        $carbon = new Carbon;

        return $carbon->parse($date)->toDayDateTimeString();
    }
}
