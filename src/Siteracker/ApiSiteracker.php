<?php

namespace Siteracker;

class ApiSiteracker
{
    public static function sendError($data = null)
    {
        $data = array('testkey' => 'testvalue');
		$data_string = json_encode($data);                                                                                   
                                                                                                                     
		$ch = curl_init('http://siteracker.test/api/test');                                                                      
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
			'Content-Type: application/json',
			'Accept : application/json',
			'Content-Length: ' . strlen($data_string))                                                                       
		);                                                                                                                   
																													 
		$result = curl_exec($ch);
		
		return "Data send!\n\r".print_r($result, true);
    }
}