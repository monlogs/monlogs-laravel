<?php

namespace DesignCoda\Monlogs;

class Monlogs
{    
    private static $api_url = 'http://siteracker.test/api/errorlog';

    public function test() {
        echo 'test';
    }
    
    public static function sendError(\Exception $e)
    {
        if($e instanceof \Symfony\Component\HttpKernel\Exception\NotFoundHttpException) {
            return;
        }
        
        $api_key = env('MONLOGS_API_KEY');
        
        if(!$api_key || $api_key == '') {
            info("Error. Log wasn't sent to Monlogs. Enter API key");
            return;
        }
        
        $data = array(
            'message' => $e->getMessage(),
            'file' => $e->getFile(),
            'line' => $e->getLine(),
            'trace' => $e->getTraceAsString(),
            'user_id' => \Auth::id(),
            'url' => request()->url(),
            'site' => request()->getHttpHost(),
            'api_key' => $api_key);
        
        $data_string = json_encode($data);
        $auth_username = "test";
        $auth_password = "test";

        $ch = curl_init(self::$api_url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERPWD, "{$auth_username}:{$auth_password}");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Accept : application/json',
            'Content-Length: ' . strlen($data_string))
        );

        $result = curl_exec($ch);

        $api_response = json_decode($result);
        
        if(isset($api_response->result) && $api_response->result == 'success') {
            info('Log was sent to Monlogs');
            logger(print_r($api_response, true));
        } else {
            info("Error. Log wasn't sent to Monlogs");
            logger(print_r($api_response, true));
        }
    }
}