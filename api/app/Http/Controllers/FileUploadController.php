<?php

namespace App\Http\Controllers;

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
     * once the file isuploaded, store it to the database
     * 
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|object
     */
    public function uploadStore(Request $request)
    {
        //validate the request
        //assuming customer can only update .STL file
        $request->validate([
           'file'   => 'required|mimes:STL|max:2048'
        ]);

        //create the filename
        $fileName = time().'.'.$request->file->extension();

        //move the file from temp storage
        if($request->file->move(public_path('uploads'), $fileName))
        {
            return back()->setStatusCode('201')
                ->with('file', $fileName)
                ->with('success', 'successfully uploaded the file');
        } else {
            return back()
                ->setStatusCode('403')
                ->with('error', 'error uploading the file');
        }
    }


}
