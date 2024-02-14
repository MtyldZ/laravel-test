<?php

namespace App\Services\KaviCms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class KaviCMSController extends Controller
{
    public function index(Request $request, IKaviCmsCacheReader $cmsCacheReader): View
    {
        return $cmsCacheReader->getPageByPath($request->path());
    }
}
