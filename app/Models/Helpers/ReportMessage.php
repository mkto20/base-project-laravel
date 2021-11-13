<?php

namespace App\Models\Helpers;

use Illuminate\Support\Facades\Session;

class ReportMessage
{

    public static function save(String $model)
    {
        Session::flash("message", Message::store($model));
        Session::flash("toast", "success");
    }

    public static function update(String $model)
    {
        Session::flash("message", Message::update($model));
        Session::flash("toast", "success");
    }

    public static function delete(String $model)
    {
        Session::flash("message", Message::delete($model));
        Session::flash("toast", "success");
    }

    public static function softDelete(String $model)
    {
        Session::flash("message", Message::delete($model));
        Session::flash("toast", "success");
    }

    public static function attach(String $model)
    {
        Session::flash("message", Message::attach($model));
        Session::flash("toast", "success");
    }

    public static function detach(String $model)
    {
        Session::flash("message", Message::detach($model));
        Session::flash("toast", "success");
    }

    public static function denied()
    {
        Session::flash("message", "denied");
        Session::flash("toast", "erro");
    }

    public static function notFound()
    {
        Session::flash("message", "Página não encontrada!");
        Session::flash("toast", "warning");
    }

    public static function genericMessage($message, $type)
    {
        Session::flash("message", $message);
        Session::flash("toast", "$type");
    }
}
