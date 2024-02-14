<?php

namespace App\Http\Controllers;

use App\Services\KaviCms\IKaviCmsCacheReader;
use App\Services\KaviCms\Navigation;
use App\Services\KaviCms\KaviCMS;
use Illuminate\Http\Request;

class AppController extends Controller
{
    private KaviCMS $veranda;
    private IKaviCmsCacheReader $cmsCacheReader;

    public function __construct()
    {
        $this->veranda = app(KaviCMS::class);
        $this->cmsCacheReader = app(IKaviCmsCacheReader::class);
    }

    public function index(Request $request)
    {
        // laravel acilirken 1 sefer yapacak veranda service cache i doldur
        // plugin yapmak kolay mi arastir
        // demo websitesini yap

        // url +
        // get page by url +
        // template cek +
        // template in layout id sine gore layout u al +
        // layout dan navigationGroup lari al +
        // return view(template->viewName, compact(['pageData', 'navigationGroup'])); +

        $url = $request->path();
        $page = $this->veranda->getPageByLink($url);
        $pageTemplate = $this->veranda->getPageTemplate($page->templateId);
        $pageLayout = $this->veranda->getPageLayout($pageTemplate->layoutId);

        $nav = [];
        foreach ($pageLayout->navigationGroups as $navigationGroup) {
            $nav[$navigationGroup['key']] = $this->veranda->getNavigationGroups($navigationGroup['key'], $page->language->languageCode);
        }
        $navigation = new Navigation($nav);

        return view($pageTemplate->viewName, ['page' => $page, 'nav' => $navigation]);
    }
}
