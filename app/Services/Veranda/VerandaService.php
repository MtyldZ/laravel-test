<?php

namespace App\Services\Veranda;

use Exception;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class VerandaService
{
    const API_URL = 'http://54.73.124.167:8091';
    const AUTH_URL = 'http://3.255.242.198:8092';

    private string $token = "";
    private GetPagesResponse $pagesResponse;
    public array $pageByIdResponseList = [];
    public array $linkToPageId = [];

    public function __construct()
    {
        $this->authToken();
        $this->getPages();
    }

    private function authToken()
    {
        $token = (string)Cache::get("token");
        if (!$token) {
            error_log("cache token miss");
            $res = Http::asForm()->post(self::AUTH_URL . "/oauth2/token", [
                'grant_type' => 'client_credentials',
                'client_id' => 'CLIENT-1000-1005',
                'client_secret' => 'secret',
            ]);
            if (!$res->ok()) throw new Exception("Veranda auth unauthorized");
            $token = $res['access_token'];
            Cache::put('token', $token, $res['expires_in']);
        }
        $this->token = $token;
    }

    private function getPages(): void
    {
        $res = Http::withToken($this->token)->get(self::API_URL . "/pages");
        $this->pagesResponse = GetPagesResponse::makeWithArray($res->json());

        foreach ($this->pagesResponse->pageIdList as $id) {
            $pageById = $this->getPageById($id);
            $this->pageByIdResponseList[$id] = $pageById;

            foreach ($pageById->links as $link) {
                $this->linkToPageId[$link] = $id;
            }
        }
    }

    private function getPageById(int $id): GetPageByIdResponse
    {
        $res = Cache::get("/pages/$id");
        if (!$res) {
            error_log("cache /pages/$id miss");
            $res = Http::withToken($this->token)->get(self::API_URL . "/pages/{$id}")->json();
            Cache::put("/pages/$id", $res, 3600);
        }
        return GetPageByIdResponse::makeWithArray($res);
    }

    public function getPageByLink(string $link)
    {
        if (!array_key_exists($link, $this->linkToPageId)) {
            throw new Exception("No page found with link:$link");
        }
        return $this->pageByIdResponseList[$this->linkToPageId[$link]];
    }
}
