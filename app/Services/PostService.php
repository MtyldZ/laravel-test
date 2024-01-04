<?php

namespace App\Services;

use App\Models\Post;
use App\Models\Topic;

class PostService
{
    public function createPost($title, $description, $image, Topic $topic)
    {
        $post = new Post();
        $post['title'] = $title;
        $post['description'] = $description;
        $post['image'] = $image;
        $post['topic_id'] = $topic->id;
        $post->save();

        return $post;
    }

    public function updatePost($id, $title, $description, $image, Topic $topic)
    {
        $post = Post::findOrFail($id);
        if ($post) {
            $post['title'] = $title;
            $post['description'] = $description;
            $post['image'] = $image;
            $post['topic_id'] = $topic->id;
            $post->save();
        }
        return $post;
    }

    public function deletePost($user)
    {
    }

    public function getById(int $id)
    {
        return Post::findOrFail($id);
    }

    public function getAll($query = null)
    {
        return Post::where($query)->get();
    }

    public function getCount($query = null)
    {
        return Post::where($query)->get()->count();
    }


}

