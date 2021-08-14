<?php

namespace App\Http\Controllers;
use App\Models\PdfBook;
use Illuminate\Http\Request;

class PdfBookController extends Controller
{


    public function addPdfBook(Request $request){
     
        
        $pdfBook = PdfBook::create(
            [
                'pdfName'=>$request->pdfName,
                'pdfImage'=>$request->pdfImage,
            ]
            
        );

        return response()->json([       
            'success'=>true,
            'data'=>$pdfBook,
                   
        ]);
    }

    public function showAllPdf(){   
        
        $pdfBook =  PdfBook::all();
        return response()->json([
            'success'=>true,
            'pdfBooks'=>$pdfBook,
        
            ]);
    }

        
    public function editPdf(Request $request){


        $id = $request->id;

        if ( PdfBook::find( $id ) === null ) {

            return response()->json([
                'success'=>false,
                'msg'=>"This pdf does not exist",
                
            ],200);
        }
        else{
            PdfBook::where('id',$id)->update([

                'pdfName'=>$request->pdfName,
                'pdfImage'=>$request->pdfImage,
            ]); 
    
            return response()->json([
                'success'=>true,
                'msg'=>"Updated Successfully",
                'id'=>$request['id'],
                'pdfName'=>$request['pdfName'],
                'pdfImage'=>$request['pdfImage'],
                
            ],200);
        }
       
    }


    public function deletePdfBook(Request $request){

        $id  = $request->id;
        if ( PdfBook::find( $id ) === null ) {

            return response()->json([
                'success'=>false,
                
            ],200);
        }
        else{
            PdfBook::where('id',$id)->delete();


        return response()->json([
            'msg'=>"Deleted successfully"
        ]);
        }

    }

}
