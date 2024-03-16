<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function index()
    {
        $post = Post::all();
        if($post->isEmpty()){
            return response()->json(["status" => false, "message" => "There is not any product"]);
        }
        return response()->json(['status' => true, "result" => $post]);
    }

    public function show($id)
    {
        $findPost = Post::find($id);
        if(!$findPost){
            return response()->json(['status' => false, 'message' => 'Post not found'], 400);
        }
        return response()->json(['status' => true, 'data' => $findPost],200);
    }

    public function store(Request $request)
    {
        $validate = Validator::make($request->all(),[
            "title" => 'required|string',
            "content" => "required|string",
        ]);
        if($validate->fails()){
            return response()->json(['status' => false, 'message' => $validate->messages()]);
        }

        $post = Post::create($request->all());

        return response()->json(['status' => true, 'message' => "Post created successfully", 'post' => $post]);
    }

    public function update(Request $request, int $id)
    {
        $validate = Validator::make($request->all(),[
            "title" => "required|string",
            "content" => 'required|string',
        ]);
        if($validate->fails()){
            return response()->json(['status' => false, 'message' => $validate->messages()]);
        }

        $post = Post::find($id);
        if(!$post){
            return response()->json(['status' => false, 'message' => "Post not found"]);
        }
        $post->title = $request['title'];
        $post->content = $request['content'];
        $post->update();

        return response()->json(['status' => true, 'message' => "Post updated successfully", 'post' => $post]);
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        if(!$post){
            return response()->json(["status" => false, "message" => "There is not any product"]);
        }
        $post->delete();
        return response()->json(['status' => true, 'message' => "Post deleted successfully"]);
    }
}
