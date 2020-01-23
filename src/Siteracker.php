<?php

namespace DesignCoda\Siteracker;

class Siteracker
{    
    public function test() {
        echo 'test';
    }
    
    public static function sendError(\Exception $e)
    {
        if($e instanceof \Symfony\Component\HttpKernel\Exception\NotFoundHttpException) {
            return;
        }
        
        $data = array(
            'message' => $e->getMessage(),
            'file' => $e->getFile(),
            'line' => $e->getLine(),
            'trace' => $e->getTraceAsString(),
            'user_id' => \Auth::id(),
            'url' => request()->url(),
            'site' => request()->getHttpHost());
        $data_string = json_encode($data);
        $Auth_Username = "test";
        $Auth_Password = "test";

        $ch = curl_init('http://siteracker.test/api/errorlog');
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERPWD, "{$Auth_Username}:{$Auth_Password}");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Accept : application/json',
            'Content-Length: ' . strlen($data_string))
        );

        $result = curl_exec($ch);

        $api_response = json_decode($result);
        if(isset($api_response->result) && $api_response->result == 'success') {
            info('Log was sent to Siteracker');
        } else {
            info("Error. Log wasn't sent to Siteracker");
        }
    }
}