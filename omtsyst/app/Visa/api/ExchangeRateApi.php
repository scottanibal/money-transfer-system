<?php

namespace App\Visa\api;

class ExchangeRateApi
{
    const URL = "https://community-neutrino-currency-conversion.p.rapidapi.com/convert";
    const KEY_API = "37329ee756msh2daf6dba0c8fb42p1a2ba3jsnb3e6a9fbae6e";

    /**
     * @param $_from
     * @param $_to
     * @param $_value
     */
    public static function exchangerate($_from , $_to, $_value)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => self::URL,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "from-type=$_from&to-type=$_to&from-value=$_value",
            CURLOPT_HTTPHEADER => array(
                "content-type: application/x-www-form-urlencoded",
                "x-rapidapi-host: community-neutrino-currency-conversion.p.rapidapi.com",
                "x-rapidapi-key: " . self::KEY_API
            ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            echo $response;
        }
    }
}
