<?php

function ResponseJSON($data, $code = 200)
{
    $status = null;
    switch ($code) {
        case 200:
            $status = "Success";
            break;
        case 404:
            $status = "Not Found";
            break;
        case 403:
            $status = "Forbidden";
            break;
        case 401:
            $status = "Unauthorized";
            break;
        case 500:
            $status = "Internal Server Error";
            break;
        default:
            $status = "Internal Server Error";
    }
    $respon = [
        'status' => $code,
        'msg' => $status,
        'data' => $data
    ];
    return response()->json($respon, $code)->header('Accept', 'application/json');
}