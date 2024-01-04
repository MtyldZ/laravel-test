<?php

namespace App\Services;

use App\Models\Post;
use App\Models\Topic;

class TopicService
{
    public function createTopic($title, $info)
    {
        $post = new Topic();
        $post['title'] = $title;
        $post['info'] = $info;
        $post->save();

        return $post;
    }

    public function updateTopic($id, $title, $info)
    {
        $post = Topic::findOrFail($id);
        if ($post) {
            $post['title'] = $title;
            $post['info'] = $info;
            $post->save();
        }
        return $post;
    }

    public function deleteTopic($id)
    {
    }

    public function getById(int $id)
    {
        return Topic::findOrFail($id);
    }

    public function getAll($query = null)
    {
        return Topic::where($query);
    }

    public function getCount($query = null)
    {
        return Topic::where($query)->count();
    }


}

