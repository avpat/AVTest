<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    //this will have a view
    public function upload()
    {
        return view('fileUpload');
    }

    //this will have a store function
    public function uploadStore()
    {
        dd('store called');
    }


}
