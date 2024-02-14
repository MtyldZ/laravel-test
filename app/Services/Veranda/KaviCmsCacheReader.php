<?php


namespace App\Services\Veranda;

use App\Services\Veranda\ResponseModel\GetPageByIdResponse;
use App\Services\Veranda\ResponseModel\PageLayout;
use App\Services\Veranda\ResponseModel\PageTemplate;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class KaviCmsCacheReader implements IKaviCmsCacheReader
{
    function getPageByPath(string $path): View
    {
        /**
         * @var PageTemplate $template
         * @var PageLayout $layout
         */

        $linksToCache = Cache::get("kavicms/links");

        //** @var GetPageByIdResponse */
        $pageById = Cache::get("kavicms/pages/$linksToCache[$path]");
        $template = Cache::get("kavicms/templates")[$pageById->templateId];
        $layout = Cache::get("kavicms/pagelayouts")[$template->layoutId];

        $nav = [];
        foreach ($layout->navigationGroups as $navigationGroup) {
            $key = $navigationGroup['key'];
            $languageCode = $pageById->language->languageCode;
            $nav[$navigationGroup['key']] = Cache::get("kavicms/navigations/$key/$languageCode");
        }
        $navigation = new Navigation($nav);

        return view($template->viewName, ['page' => $pageById, 'nav' => $navigation]);
    }
}
