<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Feed;
use Illuminate\Support\Facades\Validator;

class FeedsController extends Controller
{
    /**
     * Get all the Feeds Function
     */
    public function getAllFeeds(){
        $feeds = Feed::orderBy('id', 'DESC')->get()->toJson(JSON_PRETTY_PRINT);
        return response($feeds, 200);
    }

    /**
     * Feed post save function
     */
    public function addPost(Request $request){
        $validator      =       Validator::make($request->json()->all(), [
            'post_title'         =>      'required|string|max:255|unique:feeds',
            'post_description'   =>      'required|string|max:455',
        ]);

        if ($validator->fails()) {
            return  response()->json($validator->errors()->toJson(), 400);
        }

             $feed                =       Feed::create([
            'post_title'          =>      $request->json()->get('post_title'),
            'post_description'    =>      $request->json()->get('post_description'),
        ]);
        
        $msg = "Post save to Feeds Successfully.";
        $status = 200;
        return response()->json(compact('feed','msg','status'), 201);
    }
}
