<?php

namespace App\Services\Veranda;

class GetPagesResponse
{
    public string $webSiteName;
    public string $webSiteDomain;
    public array $pageIdList;

    private function __construct(string $webSiteName, string $webSiteDomain, array $pageIdList)
    {
        $this->webSiteName = $webSiteName;
        $this->webSiteDomain = $webSiteDomain;
        $this->pageIdList = $pageIdList;
    }

    public static function makeWithArray(array $data): GetPagesResponse
    {
        return new GetPagesResponse($data['webSiteName'], $data['webSiteDomain'], $data['pageIdList']);
    }
}
