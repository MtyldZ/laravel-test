<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;


    public ?string $key = null;
    public ?string $value = null;
    public ?string $type = null;

    protected $fillable = [
        'key',
        'value',
        'type',
        'parent_item'
    ];

    public function parentItem()
    {
        return $this->belongsTo(Item::class, 'id');
    }

    public function childItems()
    {
        return $this->hasMany(Item::class, 'parent_item');
    }

    public function allChildItems()
    {
        return $this->childItems()->with('allChildItems');
    }

    public function format()
    {
        if ($this->allChildItems->count()) {
            return (object)[
                'items' => $this->allChildItems->map(function ($child) {
                    return $child->format();
                }),
                'value' => $this['value'],
            ];
        } else {
            return $this['value'];
        }
    }
}
