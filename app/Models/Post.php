<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public ?string $title = null;
    public ?string $description = null;
    public ?string $image = '';
    public int $topic_id = 0;
    public int $user_id = 0;

    protected $fillable = [
        'title',
        'description',
        'image',
        'topic_id',
        'user_id',
    ];

    public function topic()
    {
        return $this->belongsTo(Topic::class, 'id');

    }
}
