<?php

namespace App\Models\Helpers;

use Illuminate\Http\Request;

class Lists
{
    public static $boolean = [
        0 => 'Não',
        1 => 'Sim'
    ];

    public static $target = [
        "" => 'Aba Atual',
        '_target' => 'Nova Aba'
    ];
}
