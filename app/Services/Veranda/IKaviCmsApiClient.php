<?php

namespace App\Services\Veranda;

use App\Services\Veranda\ResponseModel\GetPagesResponse;
use App\Services\Veranda\ResponseModel\GetPageByIdResponse;

interface IKaviCmsApiClient
{
    function getToken(): string;

    function getLanguages(): array;

    function getTemplates(): array;

    function getLayouts(): array;

    function getPages(): GetPagesResponse;

    function getPageById(int $id): GetPageByIdResponse;

    function getNavigationGroups(string $navigationGroupKey, string $languageCode): array;
}
