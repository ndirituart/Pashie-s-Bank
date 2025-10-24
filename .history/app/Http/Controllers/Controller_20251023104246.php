<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponseTraits;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

 class Controller extends BaseController
{
    
    //methods, traits and properties common to all controllers

    use AuthorizesRequests, ValidatesRequests, ApiResponseTraits;
}
