<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\File;

class FileUpload extends Controller
{
  public function createForm(){
    return view('file-upload');
  }



  public function index() {
    $fileName = DB::select('select * from files');
    return view('file-upload',['file'=>$fileName]);
 }

  public function fileUpload(Request $req){
        $req->validate([
        'file' => 'required|mimes:mp4,ppx, ppt, pptx,pdf,ogv,jpg,webm|max:1997777777789',
        ]);

        $fileModel = new File;

        if($req->file()) {
            $fileName = time().'_'.$req->file->getClientOriginalName();
            $filePath = $req->file('file')->storeAs('uploads', $fileName, 'public');

            $fileModel->name = time().'_'.$req->file->getClientOriginalName();
            $fileModel->file_path = '/storage/' . $filePath;
            $fileModel->save();

            return back()
            ->with('success','File has been uploaded.')
            ->with('file', $fileName);
        }
   }



  public function destroy(File $file)

  {

      $file->delete();

      return redirect()->route('file-upload')

                      ->with('success','video  deleted successfully');

  }


  public function show(File $file)
  {
      return view('show');
  }




}
