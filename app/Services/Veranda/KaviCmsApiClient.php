<?php

namespace App\Services\Veranda;

use App\Services\Veranda\ResponseModel\GetPagesResponse;
use App\Services\Veranda\ResponseModel\NavigationGroup;
use App\Services\Veranda\ResponseModel\PageLayout;
use App\Services\Veranda\ResponseModel\PageTemplate;
use App\Services\Veranda\ResponseModel\GetPageByIdResponse;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class KaviCmsApiClient implements IKaviCmsApiClient
{
    const API_URL = 'http://54.73.124.167:8091';
    const AUTH_URL = 'http://3.255.242.198:8092';

    function getToken(): string
    {
        $token = (string)Cache::get('kavicms_token');
        // validate & refresh token
        if ($token) { // todo check expired
            return $token;
        }
        $res = Http::asForm()->post(self::AUTH_URL . "/oauth2/token", [
            'grant_type' => 'client_credentials',
            'client_id' => env('VERANDA_CLIENT_ID'),
            'client_secret' => env('VERANDA_CLIENT_SECRET'),
        ]);
        if (!$res->ok()) {
            dd("Veranda auth unauthorized");
        }
        $token = $res['access_token'];
        Cache::put('kavicms_token', $token, $res['expires_in']);
        return $token;
    }

    function getLanguages(): array
    {
        $res = Http::withToken($this->getToken())->get(self::API_URL . "/languages")->json();
        $languages = [];
        foreach ($res as $language) {
            $languages[] = new Language($language);
        }
        return $languages;
    }

    function getTemplates(): array
    {
        $res = Http::withToken($this->getToken())->get(self::API_URL . '/pagetemplates')->json();
        $pageTemplates = [];
        foreach ($res as $item) {
            $pageTemplates[$item['id']] = new PageTemplate($item);
        }
        return $pageTemplates;
    }

    function getLayouts(): array
    {
        $res = Http::withToken($this->getToken())->get(self::API_URL . '/pagelayouts')->json();
        $pageLayouts = [];
        foreach ($res as $item) {
            $pageLayouts[$item['id']] = new PageLayout($item);
        }
        return $pageLayouts;
    }

    function getPages(): GetPagesResponse
    {
        $res = Http::withToken($this->getToken())->get(self::API_URL . "/pages")->json();
        return new GetPagesResponse($res);
    }

    function getPageById(int $id): GetPageByIdResponse
    {
        $res = Http::withToken($this->getToken())->get(self::API_URL . "/pages/$id")->json();
        return new GetPageByIdResponse($res);
    }

    function getNavigationGroups(string $navigationGroupKey, string $languageCode): array
    {
        $path = "/navigations/$navigationGroupKey/$languageCode";
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

        return NavigationGroup::sort($onesWithoutParent);
    }
}
