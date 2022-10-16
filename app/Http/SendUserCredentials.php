<?php

namespace App\Http;

class SendUserCredentials 
{
    public static function SendUserCredentials(string $name, string $phone, string $username, string $password)
    {        

        $data_array =  array(
            "flow_id"        => "633efea070564a287e2bc253",
            "sender"        => "BTREDU",
            "short_url"        => "1",
            "mobiles"        => "91" . $phone,
            "name"        => $name,
            "portal"        => "KharithiPlus",
            "username"        => $username,
            "password"        => $password
        );
        $url = "https://api.msg91.com/api/v5/flow/";


        // create & initialize a curl session
        $curl = curl_init();

        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data_array));
        // OPTIONS:
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
        'authkey: 383102AvUVl5qrzKvE6333ee8cP1',
        'Content-Type: application/json',
        ));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        // EXECUTE:
        $result = curl_exec($curl);
        if(!$result){die("Connection Failure");}
        curl_close($curl);

    }

    
}

