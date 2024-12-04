<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Statics
{
    public static $URL = "http://localhost:8000";

    public static function sms($params)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.sms.ir/v1/send/verify',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode($params),
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Accept: text/plain',
                'x-api-key:gHwdHYH0BXD18btfiRzJzox7cB0nlBkPj5bgWWKrQYfGi97vRX1LHehs9fG3TxWg'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return $response;

    }

    public static function fixDate($d)
    {
        $da = explode('-', $d);
        if (count($da) == 3) {
            if (strlen($da[2]) < 2) {
                $da[2] = '0' . $da[2];
            }
            if (strlen($da[1]) < 2) {
                $da[1] = '0' . $da[1];
            }
            return $da[0] . '-' . $da[1] . '-' . $da[2];
        }
        return null;
    }

    public static function EnglishNumber($s)
    {
        $a = ["٠", "١", "٢", "٣", "٤", "٥", "٦", "٧", "٨", "٩"];
        $p = ["۰", "۱", "۲", "۳", "۴", "۵", "۶", "۷", "۸", "۹"];
        for ($i = 0; $i < 10; $i++) {
            $s = str_replace($a[$i], "$i", $s);
            $s = str_replace($p[$i], "$i", $s);
        }
        return $s;
    }

}
