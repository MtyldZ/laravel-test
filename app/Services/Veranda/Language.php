<?php

namespace App\Services\Veranda;

class Language
{
    public string $languageCode;
    public string $description;

    public function __construct(string $languageCode, string $description)
    {
        $this->languageCode = $languageCode;
        $this->description = $description;
    }

    public static function makeWithArray(array $data): Language
    {
        return new Language($data['languageCode'], $data['description']);
    }
}
