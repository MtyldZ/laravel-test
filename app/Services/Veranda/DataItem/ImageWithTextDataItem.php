<?php

namespace App\Services\Veranda\DataItem;

class ImageWithTextDataItem extends ADataItem
{
    public string $text1 = "";
    public string $text2 = "";
    public string $image = "";

    public function __construct(string $text1, string $text2 = "", string $image = "")
    {
        $this->text1 = $text1;
        $this->text2 = $text2;
        $this->image = $image;
    }

    public static function makeWithArray(array $data): ADataItem
    {
        $item = new ImageWithTextDataItem($data['key.dataitem.imagewithtext.text1']);
        if (isset($data['key.dataitem.imagewithtext.text2'])) {
            $item->text2 = $data['key.dataitem.imagewithtext.text2'];
        }
        if (isset($data['key.dataitem.imagewithtext.image'])) {
            $item->image = $data['key.dataitem.imagewithtext.image'];
        }
        return $item;
    }
}
