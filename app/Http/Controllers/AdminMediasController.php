<?php

namespace App\Http\Controllers;

use App\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminMediasController extends Controller
{
    //
    public function index()
    {
        //
        $photos = Photo::paginate(3);
        return view('admin.media.index', compact('photos'));
    }

    public function upload()
    {
        //
        return view('admin.media.create');
    }


    public function store(Request $request)
    {
        //
        $file = $request->file('file');
        $name = time() . $file->getClientOriginalName();
        $file->move('images', $name);

        Photo::create(['file'=>$name]);
        return view('admin.media.index');
    }

    public function destroy($id)
    {
        //
        $photo = Photo::findOrFail($id);
        unlink(public_path() . $photo->file);
        $photo->delete();
        Session::flash('deleted_media', 'The photo has been deleted');
        return redirect()->route('media.index');
    }
}
