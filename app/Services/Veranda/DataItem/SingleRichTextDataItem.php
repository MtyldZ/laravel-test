<?php

namespace App\Services\Veranda\DataItem;

class SingleRichTextDataItem extends ADataItem
{
    public string $content = "";

    public function __construct(string $content)
    {
        $this->content = $content;
    }

    public static function makeWithArray(array $data): ADataItem
    {
        return new SingleRichTextDataItem(
            $data['key.dataitem.singlerichtext.content'],
        );
    }
}
