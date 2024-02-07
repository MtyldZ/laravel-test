<?php

namespace App\Services\Veranda;

class GetPageByIdResponse
{
    public int $id;
    public string $resourceKey;
    public string $name;
    public string $templateId;
    public Language $language;
    public array $content; // Content[]
    public array $links;

    public function __construct(int $id, string $resourceKey, string $name, string $templateId, Language $language, array $content, array $links)
    {
        $this->id = $id;
        $this->resourceKey = $resourceKey;
        $this->name = $name;
        $this->templateId = $templateId;
        $this->language = $language;
        $this->content = $content;
        $this->links = $links;
    }

    public static function makeWithArray(array $data): GetPageByIdResponse
    {
        $contentArr = [];
        foreach ($data['content']['content'] as $contentRaw) {
            $contentArr[$contentRaw['resourceKey']] = collect($contentRaw['data'])->map(function ($content) {
                return Content::makeWithArray($content);
            });
        }
        return new GetPageByIdResponse(
            $data['id'],
            $data['resourceKey'],
            $data['name'],
            $data['templateId'],
            Language::makeWithArray($data['language']),
            $contentArr,
            $data['links'],
        );
    }
}
