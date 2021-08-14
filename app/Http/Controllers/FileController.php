<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    public function uploadImage (Request $request){ 
  
                   
        $pic= $request->photo->hashName();        
        request()->file('photo')->move(public_path("/uploads"), $pic);                     
       // $photoUrl  = url('/uploads',$pic);
        $photoUrl = '/uploads/'.$pic;
        return response()->json([
            'imageUrl'=> $photoUrl
            //'path'=> $path
        ],200);
    
} 


public function uploadPdf(Request $request)
{
      if($request->file('file')) 

      {
          $pdf= $request->file->hashName();   
        //   $file = $request->file('file');
        //   $filename = time() . '.' . $request->file('file')->extension();
        //   $filePath = public_path() . '/files/uploads/';
        //   $file->move($filePath, $filename);
        request()->file('file')->move(public_path("/uploads"), $pdf);       
          $pdfUrl = '/uploads/'.$pdf;

          return response()->json([
            'pdfUrl'=> $pdfUrl
            //'path'=> $path
        ],200);
    
      }
    }
}
