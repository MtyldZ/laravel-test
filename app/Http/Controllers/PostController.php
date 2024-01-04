<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\File;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        $postCount = Post::all()->count();
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

        $topic = Topic::where(['title' => $validated['topic']])->first();
        if (!$topic) {
            return response(400)->json([
                'error' => 'Topic not found',
            ]);
        }

        $fileName = time() . '.' . $request['image']->extension();
        $request->image->storeAs('public/images', $fileName);

        $post = new Post();
        $post['title'] = $validated['title'];
        $post['description'] = $validated['description'];
        $post['image'] = $fileName;
        $post['topic_id'] = $topic->id;
        $post->save();

        return redirect('/posts');
    }
}
