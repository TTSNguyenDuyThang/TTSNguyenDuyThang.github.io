<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TextConfig;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Repositories\TextRepository;

class TextConfigController extends Controller
{
    public function index(){
        $text_config = TextConfig::all();
        if($text_config->count()>0){
             return response()->json([
            'status' =>200,
            'text_config' =>$text_config
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
            'textID'=>'required|string|max:191',
            'pageID'=>'required|string|max:191',
            'position'=>'required|string|max:191'
            
        ]);
        if($validator->fails()){
            return response()->json([
                'status'=>'422',
                'messages'=>$validator->messages()
            ], 422);
            }else{
                $text_config = TextConfig::create([
                    'textID'=>$request->textID,
                    'pageID'=>$request->pageID,
                    'position'=>$request->position
                    
                ]);
                if($text_config){
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
        $text_config= TextConfig::find($id);
        if($text_config){
            return response()->json([
                'status'=>200,
                'text_config'=>$text_config
            ]);
        }else{
            return response()->json([
                'status'=>404,
                'messages'=>'Not found textconfig'
            ],404);
        }
    }
    public function edit($id){
        $text_config = TextConfig::find($id);
        if($text_config){
            return response()->json([
                'status' =>200,
                'messages' => $text_config
            ]);
        }else{
            return response()->json([
                'status'=>404,
                'messages'=>'not found textconfig!'
            ]);
        }
    }
    public function update(Request $request, int $id){
        $validator = Validator::make($request->all(), [
            'textID'=>'required|string|max:191',
            'pageID'=>'required|string|max:191',
            'position'=>'required|string|max:191'
            
        ]);
        if($validator->fails()){
            return response()->json([
                'status'=>'422',
                'messages'=>$validator->messages()
            ], 422);
            }else{
            $text_config = TextConfig::find($id);
            if($text_config){
                $text_config -> update([
                    'textID'=>$request->textID,
                    'pageID'=>$request->pageID,
                    'position'=>$request->position
                        
                ]);
                return response()->json([
                        'status'=>200,
                        'messages'=>'textconfig update successfuly!'
                ],200);
            }
            else{
            return response()->json([
                        'status'=>404,
                        'messages'=>'no found textconfig!'
                    ],404);
            }
        }
    }
    public function delete($id){
        $text_config = TextConfig::find($id);
        if($text_config){
            $text_config->delete();
            return response()->json([
                'status'=>200,
                'messages'=> 'success!'
            ],200);
        }
        else{
            return response()->json([
                'status'=>404,
                'messages'=>'Not found textconfig!'
            ],404);
        }
    }
}
