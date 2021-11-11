<?php

namespace App\Models\Helpers;

use Illuminate\Http\Request;

class Functions
{
    public static function hasFilter(Request $request)
    {
        if (self::countParams($request->all()) > 0) {
            $request->flash();
        } else {
            $request->flush();
        }
        return $request;
    }

    public static function countParams($array)
    {
        if (isset($array['_token'])) {
            unset($array['_token']);
        }

        if (isset($array['page'])) {
            unset($array['page']);
        }

        $contagem = 0;
        foreach ($array as $foo) {
            if (!empty($foo) || ($foo == "0"))
                $contagem++;
        }
        return $contagem;
    }
}
