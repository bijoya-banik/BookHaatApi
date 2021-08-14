<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Suggestion;


class SuggestionController extends Controller
{
   
    public function addSuggestion(Request $request){
     
        
        $suggestion = Suggestion::create(
            [
                'userId'=>$request->userId,
                'message'=>$request->message,
            ]
            
        );

        return response()->json([       
            'success'=>true,
            'data'=>$suggestion,
                   
        ]);
    }

    public function showSuggestion(){   
        
        $suggestion =  Suggestion::with('user')->get();
        return response()->json([
            'success'=>true,
            'Suggestion'=>$suggestion,
        
            ]);
    }

}
