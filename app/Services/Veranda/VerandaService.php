<?php

namespace App\Services\Veranda;

use App\Services\Veranda\ResponseModel\GetPageByIdResponse;
use App\Services\Veranda\ResponseModel\PageLayout;
use App\Services\Veranda\ResponseModel\GetPagesResponse;
use App\Services\Veranda\ResponseModel\NavigationGroup;
use App\Services\Veranda\ResponseModel\PageTemplate;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class VerandaService
{
    const EXP = 84600;
    const API_URL = 'http://54.73.124.167:8091';
    const AUTH_URL = 'http://3.255.242.198:8092';

    public array $pageByIdResponseList = [];
    public array $linkToPageId = [];

    public static function init(): VerandaService
    {
        error_log("veranda service init worked");
//        Cache::flush();
        $instance = new VerandaService();

        $instance->getToken();
        $instance->getPageTemplates();
        $instance->getPageLayouts();
        $pagesResponse = $instance->getPages();

        foreach ($pagesResponse->pageIdList as $id) {
            $pageById = $instance->getPageById($id);

            $instance->pageByIdResponseList[$id] = $pageById;

            foreach ($pageById->links as $link) {
                $instance->linkToPageId[$link] = $id;
            }
        }

        foreach ($instance->getLanguages() as $language) {
            foreach ($instance->getPageLayouts() as $pageLayout) {
                foreach ($pageLayout->navigationGroups as $navigationGroup) {
                    $instance->getNavigationGroups($navigationGroup['key'], $language->languageCode);
                }
            }
        }
        return $instance;
    }

    private function getToken(): string
    {
        $token = (string)Cache::get('token');
        if (!$token) {
            $res = Http::asForm()->post(self::AUTH_URL . "/oauth2/token", [
                'grant_type' => 'client_credentials',
                'client_id' => env('VERANDA_CLIENT_ID'),
                'client_secret' => env('VERANDA_CLIENT_SECRET'),
            ]);
            if (!$res->ok()) {
                dd("Veranda auth unauthorized");
            }
            $token = $res['access_token'];
            Cache::put('token', $token, $res['expires_in']);
        }
        return $token;
    }

    private function getLanguages(): array
    {
        $languages = Cache::get("/languages");
        if (!$languages) {
            $res = Http::withToken($this->getToken())->get(self::API_URL . "/languages")->json();
            $languages = [];
            foreach ($res as $language) {
                $languages[] = new Language($language);
            }
            Cache::put("/languages", $languages, self::EXP);
        }
        return $languages;
    }

    private function getPages(): GetPagesResponse
    {
        $pagesRes = Cache::get("/pages");
        if (!$pagesRes) {
            $res = Http::withToken($this->getToken())->get(self::API_URL . "/pages")->json();
            $pagesRes = new GetPagesResponse($res);
            Cache::put("/pages", $pagesRes, self::EXP);
        }
        return $pagesRes;
    }

    private function getPageById(int $id): GetPageByIdResponse
    {
        $page = Cache::get("/pages/$id");
        if (!$page) {
            $res = Http::withToken($this->getToken())->get(self::API_URL . "/pages/$id")->json();
            $page = new GetPageByIdResponse($res);
            Cache::put("/pages/$id", $page, self::EXP);
        }
        return $page;
    }

    public function getPageByLink(string $link): ?GetPageByIdResponse
    {
        if ($this->linkToPageId[$link]) {
            return $this->pageByIdResponseList[$this->linkToPageId[$link]];
        }
        return null;
    }

    private function getPageTemplates(): array
    {
        $pageTemplates = Cache::get("/pagetemplates");
        if (!$pageTemplates) {
            $res = Http::withToken($this->getToken())->get(self::API_URL . '/pagetemplates')->json();
            foreach ($res as $item) {
                $pageTemplates[$item['id']] = new PageTemplate($item);
            }
            Cache::put("/pagetemplates", $pageTemplates, self::EXP);
        }
        return $pageTemplates;
    }

    public function getPageTemplate(int $id): PageTemplate
    {
        return $this->getPageTemplates()[$id];
    }

    private function getPageLayouts(): array
    {
        $pageLayouts = Cache::get("/pagelayouts");
        if (!$pageLayouts) {
            $res = Http::withToken($this->getToken())->get(self::API_URL . '/pagelayouts')->json();
            foreach ($res as $item) {
                $pageLayouts[$item['id']] = new PageLayout($item);
            }
            Cache::put("/pagelayouts", $pageLayouts, self::EXP);
        }
        return $pageLayouts;
    }

    public function getPageLayout(int $id): PageLayout
    {
        return $this->getPageLayouts()[$id];
    }

    public function getNavigationGroups(string $navigationGroupKey, string $language): array
    {
        $path = "/navigations/$navigationGroupKey/$language";
        $data = Cache::get($path);
        if (!$data) {
            $res = Http::withToken($this->getToken())->get(self::API_URL . $path)->json();

            $groupList = [];
            foreach ($res as $raw) {
                $groupList[$raw['id']] = new NavigationGroup($raw);
            }

            $onesWithParent = [];
            $onesWithoutParent = [];

            foreach ($groupList as $item) {
                if ($item->parentId != null) {
                    $onesWithParent[$item->id] = $item;
                } else {
                    $onesWithoutParent[$item->id] = $item;
                }
            }

            while (count($onesWithParent)) {
                foreach ($onesWithParent as $item) {
                    if (NavigationGroup::findParentAddItem($onesWithoutParent, $item)) {
                        unset($onesWithParent[$item->id]);
                    }
                }
            }

            $data = NavigationGroup::sort($onesWithoutParent);
            Cache::put($path, $data, self::EXP);
        }
        return $data;
    }
}
