<?php

class JSONview{
    public function response($body, $status = 200){
        header("content-type: application/json");
        $statusText = $this->_requestStatus($status);
        header("HTTP/1.1 $status $statusText");
        echo json_encode($body);
    }

    private function _requestStatus($code){
        $status = array(
            200 => "OK",
            201 => "created",
            204 => "no content",
            400 => "bad request",
            404 => "not found",
            200 => "internal server error"
        );
        if(!isset($status[$code])) {
            $code = 500;
        }
        return $status [$code];
    }
}