<?php

namespace App\Http\Controllers;

use App\FileUpload;
use Illuminate\Http\Request;

class FileUploadController extends Controller
{

    /**
     * create a simple view for the form
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function upload()
    {
        return view('fileUpload');
    }


    /**
     * once the file is uploaded, store it to the database
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        //validate the request
        //assuming customer can only update .STL file
        $request->validate([
           'file'   => 'required|mimes:STL,STP,IGES,PDF|max:4096'
        ]);

        //create the filename
        $fileName = time().'.'.$request->file->getClientOriginalName();

        //move the file from temp storage
        if($request->file->move(public_path('uploads'), $fileName))
        {
            //store the files
            $file = new FileUpload();
            $file->filename = $fileName;
            $file->type     = $request->file->getClientMimeType();
            $file->path     = public_path('uploads');
            $file->size     = $request->file->getSize();
            $file->save();

            return response()->json(['success' => 'You have successfully uploaded "' . $fileName . '"'], 200);
        } else {
            //if any issue with the upload then through error
            return response()->json(['error' => 'error uploading the file '], 500);
        }
    }


}
