<?php

namespace App\Services\Veranda;

use App\Services\Veranda\DataItem\ADataItem;
use App\Services\Veranda\DataItem\ImageWithTextDataItem;
use App\Services\Veranda\DataItem\SingleRichTextDataItem;
use App\Services\Veranda\DataItem\SingleTextDataItem;

class Content
{
    public int $orderNumber;
    public string $uuid;
    public string $description;
    public ADataItem $dataDetail;

    public function __construct(int $orderNumber, string $uuid, string $description, ADataItem $dataDetail)
    {
        $this->orderNumber = $orderNumber;
        $this->uuid = $uuid;
        $this->description = $description;
        $this->dataDetail = $dataDetail;
    }

    /**
     * @throws \Exception
     */
    public static function makeWithArray(array $data): Content
    {
        $key = explode(".", array_key_first($data['dataDetail']))[2];
        $dataItem = null;
        switch ($key) {
            case 'imagewithtext':
                $dataItem = ImageWithTextDataItem::makeWithArray($data['dataDetail']);
                break;
            case 'singlerichtext':
                $dataItem = SingleRichTextDataItem::makeWithArray($data['dataDetail']);
                break;
            case 'singletext':
                $dataItem = SingleTextDataItem::makeWithArray($data['dataDetail']);
        }
        if ($dataItem == null) {
            throw new \Exception("Unknown data item model `$key` on ".json_encode($data));
        }

        return new Content(
            $data['orderNumber'],
            $data['uuid'],
            $data['description'] || "", // todo
            $dataItem,
        );
    }
}
