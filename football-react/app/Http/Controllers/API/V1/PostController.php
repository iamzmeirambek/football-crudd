<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use App\Models\Team;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request)
    {
        return PostResource::collection(Post::query()->paginate($request->per_page ?? 15));
    }

    public function show(Post $post)
    {
        return new PostResource($post);
    }

    public function store(PostRequest $postRequest)
    {
        return new PostResource(Post::query()->create($postRequest->validated()));
    }

    public function update(PostRequest $postRequest, Post $post)
    {
        $post->update($postRequest->validated());
        return new PostResource($post);
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return response()->json([
            'message' => 'Success'
        ], 203);
    }
}
