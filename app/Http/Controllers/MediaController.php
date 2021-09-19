<?php

namespace App\Http\Controllers;

use App\Models\Media;
use Illuminate\Http\Request;
use session;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = Media::latest()->paginate(5);

        return view('videos.index', compact('videos'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('videos.form');
    }


    public function edit($id)
    {
        $media = Media::findOrFail($id);
        return view('videos.edit', compact('media'));

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('video')) {

            $file = $request->file('video');
            $path = 'videos/';
            $filenameWithExt = $file->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = 'webm';
            $fileNameToStore = preg_replace('/\s+/', '_', $filename . '_' . time() . '.' . $extension);

            \Storage::disk('public')->putFileAs($path, $file, $fileNameToStore);

            $media = Media::create(['file_name' => $fileNameToStore]);

            return  response()->json(['success' => ($media) ? 1 : 0, 'message' => ($media) ? 'Video uploaded successfully.' : "Some thing went wrong. Try again !."]);
        }
    }


    public function update(Request $request, Media $media)
    {
        $request->validate([
            'file_name' => 'required',

        ]);

        $media->update($request->all());

        return redirect()->route('videos.index')
            ->with('success','Product updated successfully');
    }

    public function search(Request $request){
        // Get the search value from the request
        $search = $request->input('search');

        // Search in the title and body columns from the posts table
        $media = Media::query()
            ->where('file_name', 'LIKE', "%{$search}%")
            // ->orWhere('body', 'LIKE', "%{$search}%")
            ->get();

        // Return the search view with the resluts compacted
        return view('videos.index', compact('media'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Media  $media
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $media = Media::find($id);
        $media->delete();
        return redirect()->route('videos.index')->with('message', 'video deleted successfully');
    }

}
