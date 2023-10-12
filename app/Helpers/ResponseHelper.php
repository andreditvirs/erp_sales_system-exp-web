<?php

namespace App\Helpers;

class ResponseHelper{
    public static function sendApiSuccess($data, $message = "Data retrieved")
    {
        $data = [
            "status" => "ok",
            "code" => 200,
            "message" => $message,
            "data" => $data
        ];
        return response()->json($data);
    }
}
?>