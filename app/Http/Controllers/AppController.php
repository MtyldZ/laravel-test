<?php

namespace App\Http\Controllers;

use App\Services\ItemService;
use App\Services\Veranda\VerandaService;

class AppController extends Controller
{
    private ItemService $itemService;
    private VerandaService $verandaService;

    public function __construct(ItemService $itemService, VerandaService $verandaService)
    {
        $this->itemService = $itemService;
        $this->verandaService = $verandaService;
    }

    public function index()
    {
        $data = $this->itemService->getAllV2();
        $verandaData = $this->verandaService->getPageByLink('/');

        return view('index', compact(['data', 'verandaData']));
    }

    public function leftSideBarIndex()
    {
        $data = $this->itemService->getAllV2();
        $verandaData = $this->verandaService->getPageByLink('/leftsidebar');

        return view('index', compact(['data', 'verandaData']));
    }
}
