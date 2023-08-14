<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use GrahamCampbell\ResultType\Success;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PageController extends Controller
{
    public function index(){
        $pages = Page::all();
        if($pages->count()>0){
             return response()->json([
            'status' =>200,
            'pages' =>$pages
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
            'background'=>'required|string|max:191',
            'storyID'=>'required|string|max:191',
            
        ]);
        if($validator->fails()){
            return response()->json([
                'status'=>'422',
                'messages'=>$validator->messages()
            ], 422);
            }else{
                $pages = Page::create([
                    'background'=>$request->background,
                    'storyID'=>$request->storyID,
                    
                ]);
                if($pages){
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
        $pages= Page::find($id);
        if($pages){
            return response()->json([
                'status'=>200,
                'pages'=>$pages
            ]);
        }else{
            return response()->json([
                'status'=>404,
                'messages'=>'Not found page'
            ],404);
        }
    }
    public function edit($id){
        $pages = Page::find($id);
        if($pages){
            return response()->json([
                'status' =>200,
                'messages' => $pages
            ]);
        }else{
            return response()->json([
                'status'=>404,
                'messages'=>'not found page!'
            ]);
        }
    }
    public function update(Request $request, int $id){
        $validator = Validator::make($request->all(), [
            'background'=>'required|string|max:191',
            'storyID'=>'required|string|max:191',
            
        ]);
        if($validator->fails()){
            return response()->json([
                'status'=>'422',
                'messages'=>$validator->messages()
            ], 422);
            }else{
            $pages = Page::find($id);
            if($pages){
                $pages -> update([
                        'background'=>$request->background,
                        'storyID'=>$request->storyID,
                        
                ]);
                return response()->json([
                        'status'=>200,
                        'messages'=>'page update successfuly!'
                ],200);
            }
            else{
            return response()->json([
                        'status'=>404,
                        'messages'=>'no found page!'
                    ],404);
            }
        }
    }
    public function delete($id){
        $pages = Page::find($id);
        if($pages){
            $pages->delete();
            return response()->json([
                'status'=>200,
                'messages'=> 'success!'
            ],200);
        }
        else{
            return response()->json([
                'status'=>404,
                'messages'=>'Not found page!'
            ],404);
        }
    }
}
