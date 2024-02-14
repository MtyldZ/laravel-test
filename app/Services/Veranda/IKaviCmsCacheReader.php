<?php

namespace App\Services\Veranda;

use Illuminate\View\View;

interface IKaviCmsCacheReader
{
    function getPageByPath(string $path): View;
}
