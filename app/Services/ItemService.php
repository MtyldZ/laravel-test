<?php

namespace App\Services;

use App\Models\Item;

class ItemService
{
    public function createTopic($key, $value)
    {
        $item = new Item();
        $item['key'] = $key;
        $item['value'] = $value;
        $item['key'] = '';
        $item->save();

        return $item;
    }

    public function updateTopic($id, $title, $info)
    {
    }

    public function deleteTopic($id)
    {
    }

    public function getById(int $id)
    {
        return Item::findOrFail($id);
    }

    public function getAll($query = null)
    {
        return Item::where($query);
    }

    public function getAllVersion1()
    {
        $items = Item::all();

        $object = (object)[];
        foreach ($items as $key) {
            $object->{$key['key']} = $key['value'];
        }

        return get_object_vars($object);
    }


    public function getAllV2()
    {
        $items = Item::whereNull('parent_item')->with('allChildItems')->get();

        $object = (object)[];
        foreach ($items as $item) {
            if ($item->allChildItems->count()) {
                $object->{$item['key']} = $item->allChildItems->map(function ($child) {
                    return $child->format();
                });
            } else {
                $object->{$item['key']} = $item->format();
            }
        }

//        dd($object);
        return $object;
    }

    public function getCount($query = null)
    {
        return Item::where($query)->count();
    }


}

