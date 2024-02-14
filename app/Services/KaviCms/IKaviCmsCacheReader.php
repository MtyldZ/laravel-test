<?php

namespace App\Services\KaviCms;

use Illuminate\View\View;

interface IKaviCmsCacheReader
{
    function getPageByPath(string $path): View;
}
