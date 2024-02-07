<?php

namespace App\Services\Veranda\DataItem;

class SingleTextDataItem extends ADataItem
{
    public string $text = "";

    public function __construct(string $text)
    {
        $this->text = $text;
    }

    public static function makeWithArray(array $data): ADataItem
    {
        return new SingleTextDataItem(
            $data['key.dataitem.singletext.text'],
        );
    }
}
