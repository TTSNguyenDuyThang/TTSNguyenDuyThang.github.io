<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Text;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TextController extends Controller
{
    public function index(){
        $texts = Text::all();
        if($texts->count()>0){
             return response()->json([
            'status' =>200,
            'texts' =>$texts
        ], 200);
        }
        else{
            return response()->json([
                'status' =>404,
                'messages' =>'No record found!'
            ], 404);
        }
    }
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), 
        [
            'textContent'=>'required|string|max:191',
            
        ]);
        if($validator->fails()){
            return response()->json([
                'status'=>'422',
                'messages'=>$validator->messages()
            ], 422);
            }else{
                $texts = Text::create([
                    'textContent'=>$request->textContent
                    
                ]);
                if($texts){
                    return response()->json([
                        'status'=>200,
                        'messages'=>'create successfuly!'
                    ],200);
                }else{
                    return response()->json([
                        'status'=>500,
                        'messages'=>'error!'
                    ],500);
                }
            }
    }
    public function show($id){
        $texts= Text::find($id);
        if($texts){
            return response()->json([
                'status'=>200,
                'texts'=>$texts
            ]);
        }else{
            return response()->json([
                'status'=>404,
                'messages'=>'Not found text'
            ],404);
        }
    }
    public function edit($id){
        $texts = Text::find($id);
        if($texts){
            return response()->json([
                'status' =>200,
                'messages' => $texts
            ]);
        }else{
            return response()->json([
                'status'=>404,
                'messages'=>'not found text!'
            ]);
        }
    }
    public function update(Request $request, int $id){
        $validator = Validator::make($request->all(), [
            'textContent'=>'required|string|max:191',
            
        ]);
        if($validator->fails()){
            return response()->json([
                'status'=>'422',
                'messages'=>$validator->messages()
            ], 422);
            }else{
            $texts = Text::find($id);
            if($texts){
                $texts -> update([
                        'textContent'=>$request->textContent,
                        
                ]);
                return response()->json([
                        'status'=>200,
                        'messages'=>'text update successfuly!'
                ],200);
            }
            else{
            return response()->json([
                        'status'=>404,
                        'messages'=>'no found text!'
                    ],404);
            }
        }
    }
    public function delete($id){
        $texts = Text::find($id);
        if($texts){
            $texts->delete();
            return response()->json([
                'status'=>200,
                'messages'=> 'success!'
            ],200);
        }
        else{
            return response()->json([
                'status'=>404,
                'messages'=>'Not found text!'
            ],404);
        }
    }
}
