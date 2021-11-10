<?php

namespace App\Models\Helpers;

class Message
{

    public static function index(String $modelName)
    {
        return "{$modelName} recuperados(as) com sucesso";
    }

    public static function store(String $modelName)
    {
        return "{$modelName} criado(a) com sucesso";
    }

    public static function show(String $modelName)
    {
        return "{$modelName} recuperado(a) com sucesso";
    }

    public static function update(String $modelName)
    {
        return "{$modelName} atualizado(a) com sucesso";
    }

    public static function delete(String $modelName)
    {
        return "{$modelName} excluído(a) com sucesso";
    }

    public static function restore(String $modelName)
    {
        return "{$modelName} recuperado(a) com sucesso";
    }

    public static function attach(String $modelName)
    {
        return "{$modelName} atribuído(a) com sucesso";
    }

    public static function detach(String $modelName)
    {
        return "{$modelName} desatribuído(a) com sucesso";
    }
}
