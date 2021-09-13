<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\File;

class FileUpload extends Controller
{



  public function index() {
    $fileName = DB::select('select * from files');
    return view('pages.tables',['file'=>$fileName]);
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
            $fileModel->file_path = '' . $filePath;
            $fileModel->save();

            return back()
            ->with('success','File has been uploaded.')
            ->with('file', $fileName);
        }
   }

   public function destroy($id)
   {
           $image = \DB::table('files')->find('id', $id)->first();
           $file= $image->file_path;
           $filename = public_path().'/uploads'.$file;
           \File::delete($id);
    }

//   public function destroy(File $file)

//   {

//       $file->delete();

//       return redirect()->route('pages.tables')

//                       ->with('success','video  deleted successfully');

//   }


  public function show(File $file)
  {
      return view('show');
  }




}
