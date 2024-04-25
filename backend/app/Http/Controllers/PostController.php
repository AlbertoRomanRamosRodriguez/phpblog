<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest; // New line for PostRequest
use App\Models\Post;
use Illuminate\Http\Request;

use OpenApi\Attributes as OA;


class OpenApi
{
}

#[OA\Info(title: "My First API", version: "0.1")]

class PostController extends Controller
{
    
    #[OA\Get(path: '/api/posts/')]
    #[OA\Response(response: '200', description: 'Retrieves all posts from the database and returns them in JSON format.')]
    
    public function showAllPosts()
    {
        return response()->json(Post::all());
    }

    #[OA\Get(path: '/api/posts/{id}')]
    #[OA\Response(response: '200', description: 'Retrieves all posts from the database and returns them in JSON format.')]
    public function showOnePost($id)
    {
        return response()->json(Post::find($id));
    }

    /**
     * 
     *
     * @param PostRequest $request Validated request containing post data
     * @return \Illuminate\Http\JsonResponse Created post wrapped in JSON response
     */
    #[OA\Post(path: '/api/posts/')]
    #[OA\Response(response: '201', description: 'Creates a new post record in the database using validated data from the request body.')]
    public function create(PostRequest $request)
    {
        $this->validate($request, [
            'title' => 'required|unique:id',
            'content' => 'required',
            'author_name' => 'required'
        ]);

        $post = Post::create($request->validated()); // Use validated data

        return response()->json($post, 201);
    }

    #[OA\Put(path: '/api/posts/{id}')]
    #[OA\Response(response: '201', description: ' Updates an existing post record identified by the `$id` parameter')]
    public function update($id, PostRequest $request)
    {
        $post = Post::findOrFail($id);
        $post->update($request->validated()); // Use validated data

        return response()->json($post, 200);
    }

    #[OA\Delete(path: '/api/posts/{id}')]
    #[OA\Response(response: '201', description: ' Deletes an existing post record identified by the `$id` parameter')]
    public function delete($id)
    {
        Post::findOrFail($id)->delete();
        return response('Deleted Successfully', 200);
    }
}
