<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Audio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AudioController extends Controller
{
    public function index(){
        $audios = Audio::all();
        if($audios->count()>0){
             return response()->json([
            'status' =>200,
            'audios' =>$audios
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
        $validator = Validator::make($request->all(), [
            'title'=>'required|string|max:191',
            'timeAudio'=>'required|string|max:191',
            'textID'=>'required|string|max:191',
            'iconID'=>'required|string|max:191',
        ]);
        if($validator->fails()){
            return response()->json([
                'status'=>'422',
                'messages'=>$validator->messages()
            ], 422);
            }else{
                $audios = Audio::create([
                    'title'=>$request->title,
                    'timeAudio'=>$request->timeAudio,
                    'textID'=>$request->textID,
                    'iconID'=>$request->iconID,
                ]);
                if($audios){
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
        $audios= Audio::find($id);
        if($audios){
            return response()->json([
                'status'=>200,
                'messages'=>$audios
            ]);
        }else{
            return response()->json([
                'status'=>404,
                'messages'=>'Not found audios'
            ],404);
        }
    }
    public function edit($id){
        $audios = Audio::find($id);
        if($audios){
            return response()->json([
                'status' =>200,
                'messages' => $audios
            ]);
        }else{
            return response()->json([
                'status'=>404,
                'messages'=>'not found audio!'
            ]);
        }
    }
    public function update(Request $request, int $id){
        $validator = Validator::make($request->all(), [
            'title'=>'required|string|max:191',
            'timeAudio'=>'required|string|max:191',
            'textID'=>'required|string|max:191',
            'iconID'=>'required|string|max:191',
        ]);
        if($validator->fails()){
            return response()->json([
                'status'=>'422',
                'messages'=>$validator->messages()
            ], 422);
            }else{
            $audios = Audio::find($id);
            if($audios){
                $audios -> update([
                        'title'=>$request->title,
                        'timeAudio'=>$request->timeAudio,
                        'textID'=>$request->textID,
                        'iconID'=>$request->iconID,
                ]);
                return response()->json([
                        'status'=>200,
                        'messages'=>'audio update successfuly!'
                ],200);
            }
            else{
            return response()->json([
                        'status'=>404,
                        'messages'=>'no found audio!'
                    ],404);
            }
        }
    }
    public function delete($id){
        $audios = Audio::find($id);
        if($audios){
            $audios->delete();
            return response()->json([
                'status'=>200,
                'messages'=> 'success!'
            ],200);
        }
        else{
            return response()->json([
                'status'=>404,
                'messages'=>'Not found audio!'
            ],404);
        }
    }
}
