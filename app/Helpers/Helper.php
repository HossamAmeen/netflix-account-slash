<?php

namespace App\Helpers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;


class Helper
{
    public static function modelChecker($model) {

        if (empty($model))
        {
            return '404';
        }
        
    }
}