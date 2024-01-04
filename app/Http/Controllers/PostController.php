<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Topic;
use App\Services\ImageService;
use App\Services\PostService;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\File;

class PostController extends Controller
{
    public function __construct(PostService $postService, ImageService $imageService)
    {
        $this->postService = $postService;
        $this->imageService = $imageService;
    }

    public function index()
    {
        $posts = $this->postService->getAll();
        $postCount = $this->postService->getCount();
        return view('posts.index', compact(['posts', 'postCount']));
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function create()
    {
        $topics = Topic::all();
        return view('posts.create', compact('topics'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => '',
            'image' => ['required', File::image()],
            'topic' => ['required', 'string']
        ]);

        // todo
        $topic = Topic::where(['title' => $validated['topic']])->first();
        if (!$topic) {
            return response(400)->json(['error' => 'Topic not found']);
        }

        $fileName = $this->imageService->saveImage($request['image']);

        ['title' => $title, 'description' => $description] = $validated;
        $this->postService->createPost($title, $description, $fileName, $title->id);

        return redirect('/posts');
    }
}
