<?php

namespace App\Http\Controllers;

use App\Services\Post\Service;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    public $service;

    /**
     * @param $service
     */
    public function __construct(Service $service)
    {
        $this->service = $service;
    }
}
