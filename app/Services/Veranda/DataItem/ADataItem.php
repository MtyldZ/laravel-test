<?php

namespace App\Services\Veranda\DataItem;

abstract class ADataItem
{
    abstract public static function makeWithArray(array $data): ADataItem;
}
