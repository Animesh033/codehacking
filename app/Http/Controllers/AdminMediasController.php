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
        Session::flash('create_media', 'The photo has been uploaded');
        return view('admin.media.index');
    }

    public function destroy($id)
    {
        //
        $photo = Photo::findOrFail($id);
        if($photo->file){
            unlink(public_path() . $photo->file);
        }
        $photo->delete();
        // Session::flash('deleted_media', 'The photo has been deleted');
        // return redirect()->route('media.index');
    }

    public function deleteMedia(Request $request)
    {
        if(isset($request->delete_single)){
            $this->destroy($request->photo);
            Session::flash('deleted_media', 'The photo has been deleted');
            return redirect()->route('media.index');
        }

        if(isset($request->delete_all) && !empty($request->checkBoxArray)){
            $photos = Photo::findOrFail($request->checkBoxArray);
            foreach ($photos as $photo) {
                if($photo->file){
                    unlink(public_path() . $photo->file);
                }
                $photo->delete();
            }
            Session::flash('deleted_media', 'All photos have been deleted');
            return redirect()->back();
        }else{
            return redirect()->back();
        }
        
    }
}
