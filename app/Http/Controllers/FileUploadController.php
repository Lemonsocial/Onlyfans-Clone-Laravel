<?php

   

namespace App\Http\Controllers;

  

use Illuminate\Http\Request;

  

class FileUploadController extends Controller

{

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function fileUpload()

    {

        return view('fileUpload');

    }

  

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function fileUploadPost(Request $request)

    {

        $request->validate([

            'file' => 'required|mimes:pdf,xlx,csv|max:2048',

        ]);

  

        $fileName = time().'.'.$request->file->extension();  

   

        $request->file->move(public_path('uploads'), $fileName);

   

        return back()

            ->with('success','You have successfully upload file.')

            ->with('file',$fileName);

   

    }

}