<?php 

//Note: This file should be included first in every php page.

define('BASE_PATH', dirname(dirname(__FILE__)));
define('APP_FOLDER','simpleadmin');
define('CURRENT_PAGE', basename($_SERVER['REQUEST_URI']));


require_once BASE_PATH.'/includes/MysqliDb.php';

/*
|--------------------------------------------------------------------------
| DATABASE CONFIGURATION
|--------------------------------------------------------------------------
*/

define('DB_HOST', "localhost:3306");
define('DB_USER', "cliff");
define('DB_PASSWORD', "Trymenot#123$");
define('DB_NAME', "recognizer");

/**
* Get instance of DB object
*/
function getDbInstance()
{
	return new MysqliDb(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
}
function login($url,$header, $postfields) {

       
    // $out = array_values($details);
    //echo $details;
     $js = json_encode($postfields);


    $curl = curl_init();
    curl_setopt_array($curl, array(
        //curl_setopt ($curl, CURLOPT_CAINFO, dirname(__FILE__)."/cacert.pem"),
        //curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false),
        //CURLOPT_CAINFO=> dirname(__FILE__)."/cacert.pem",

        CURLOPT_SSL_VERIFYPEER => 0,
        CURLOPT_SSL_VERIFYHOST => false,
        CURLOPT_PORT => 8080,
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => $js,
        CURLOPT_HTTPHEADER => $header,
    ));

    $response = curl_exec($curl);
    $http_status = curl_getinfo($curl, CURLINFO_HTTP_CODE);

    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        $error = array();
        $error['code'] = $http_status;
        $error['message'] = $err;
        return json_encode($error);
    } else {

        return $response;
    }
}

function get_details_from_endpoint($url) {
    
    $headers = Array();
            $headers[0] = 'Content-Type:application/json';
            $headers[1] = 'Accept:application/json';
            $headers[2] = 'access_key:b40e35c7e3d532f2';
            $headers[3] = 'access_secret:3db263faa836e9ec22718c4d9dc1e460';
            $headers[4] = 'Authorization: Bearer ' . $_SESSION['token'];


    $curl = curl_init();
    curl_setopt_array($curl, array(
        //curl_setopt ($curl, CURLOPT_CAINFO, dirname(__FILE__)."/cacert.pem"),
        //curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false),
        //CURLOPT_CAINFO=> dirname(__FILE__)."/cacert.pem",

        CURLOPT_SSL_VERIFYPEER => 0,
        CURLOPT_SSL_VERIFYHOST => false,
        CURLOPT_PORT => 8080,
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => $headers,
    ));

    $response = curl_exec($curl);
    $http_status = curl_getinfo($curl, CURLINFO_HTTP_CODE);

    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        $error = array();
        $error['code'] = $http_status;
        $error['message'] = $err;
        return json_encode($error);
    } else {

        return $response;
    }
}
function get_details_to_endpoint($url, $postfields) {

         $headers = Array();
            $headers[0] = 'Content-Type:application/json';
            $headers[1] = 'Accept:application/json';
            $headers[2] = 'access_key:b40e35c7e3d532f2';
            $headers[3] = 'access_secret:3db263faa836e9ec22718c4d9dc1e460';
            $headers[4] = 'Authorization: Bearer ' . $_SESSION['token'];

    // $out = array_values($details);
    //echo $details;
     $js = json_encode($postfields);


    $curl = curl_init();
    curl_setopt_array($curl, array(
        //curl_setopt ($curl, CURLOPT_CAINFO, dirname(__FILE__)."/cacert.pem"),
        //curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false),
        //CURLOPT_CAINFO=> dirname(__FILE__)."/cacert.pem",

        CURLOPT_SSL_VERIFYPEER => 0,
        CURLOPT_SSL_VERIFYHOST => false,
        CURLOPT_PORT => 8080,
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => $js,
        CURLOPT_HTTPHEADER => $headers,
    ));

    $response = curl_exec($curl);
    $http_status = curl_getinfo($curl, CURLINFO_HTTP_CODE);

    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        $error = array();
        $error['code'] = $http_status;
        $error['message'] = $err;
        return json_encode($error);
    } else {

        return $response;
    }
}
