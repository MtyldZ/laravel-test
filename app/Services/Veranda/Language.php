<?php

namespace App\Services\Veranda;

class Language
{
    public string $languageCode;
    public string $description;

    public function __construct(array $data)
    {
        foreach ($data as $key => $value) {
            $this->$key = $value;
        }
    }
}
