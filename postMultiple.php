<?php

session_start();
ini_set('max_execution_time', 0);
$postfields = array();
$postfields['usernameOrEmail'] = 'cliff';
$postfields['password'] = 'Trymenot#123';

$headers = Array();
$headers[0] = 'Content-Type:application/json';
$token = json_decode(get_details_from_endpoint('http://localhost:8080/recognizer/api/auth/signin', $headers, $postfields, '8080'), true);
$_SESSION['token'] = $token['accessToken'];
//$_SESSION['success'] = '';
//$_SESSION['failure'] = '';
echo $countfiles = count($_FILES['file']['name']);
//exit();
for ($i = 0; $i < $countfiles; $i++) {
    doUpload($i);
}
header('location: addMultiple.php');
exit();

function doUpload($i) {
    $targetdir = 'uploads/';
// name of the directory where the files should be stored
    $targetfile = $targetdir . $_FILES['file']['name'][$i];
    $fileName = $_FILES['file']['name'][$i];


    if (move_uploaded_file($_FILES['file']['tmp_name'][$i], $targetfile)) {

        $headers = Array();
        $headers[0] = 'Content-Type:application/json';
        $headers[1] = 'Accept:application/json';
        $headers[2] = 'access_key:64235c0adb177bfbb146d934a4a5e698';
        $headers[3] = 'access_secret:5B2xz9NsIRqrdZLAhtSQdT7FW7ea1tIdLSfhjZ15';
        $headers[4] = 'host: identify-eu-west-1.acrcloud.com';
        $headers[5] = 'Authorization: Bearer ' . $_SESSION['token'];

        $postfields = array();
        $postfields['membershipNo'] = $_POST['memberNo'][$i];
        $postfields['stageName'] = $_POST['stageName'][$i];
        $postfields['album'] = $_POST['album'][$i];
        $postfields['title'] = $_POST['title'][$i];
        $postfields['artistName'] = $_POST['artistName'][$i];
        $postfields['dataPath'] = __DIR__ . "/" . $targetfile;

        echo $res = get_details_from_endpoint("http://localhost:8080/recognizer/api/recognize", $headers, $postfields, "8080");
        $response1 = json_decode($res, true);
        if (isset($response1['code']) && $response1['code'] == '0') {
            $_SESSION['failure'] .= $fileName . " Server timeout kindly try again later " . '<br />';

            header('location: addMultiple.php');
            exit();
        }
        if (isset($response1['success']) && $response1['success'] == 'true') {
            //upload to cloud
            $headers = Array();
            $headers[0] = 'Content-Type:application/json';
            $headers[1] = 'Accept:application/json';
            $headers[2] = 'access_key:b40e35c7e3d532f2';
            $headers[3] = 'access_secret:3db263faa836e9ec22718c4d9dc1e460';
            $headers[4] = 'Authorization: Bearer ' . $_SESSION['token'];

            $postfields = array();
            $postfields['audioId'] = $response1['upload']['id'];
            $postfields['bucketName'] = 'MCSK Database';
            $postfields['audioTitle'] = $response1['upload']['title'];
            $customFields = Array();
            $customFields['membershipNo'] = $response1['upload']['membershipNo'];
            $customFields['stageName'] = $response1['upload']['stageName'];
            $customFields['album'] = $response1['upload']['album'];
            $customFields['title'] = $response1['upload']['title'];
            $customFields['artistName'] = $response1['upload']['artist'];
            $postfields['userParams'] = $customFields;
            $postfields['dataPath'] = __DIR__ . "/" . $targetfile;

            echo $res = get_details_from_endpoint("http://localhost:8080/recognizer/api/upload", $headers, $postfields, "8080");
            $response = json_decode($res, true);
            if (isset($response['success']) && $response['success'] == 'true') {
                $_SESSION['success'] .= "<strong>" . $fileName . "</strong>" . " Was uploaded successfully <br />";
                // header('location: uploads.php');
                // exit();
            } else {
                //  exit();
                $_SESSION['failure'] .= "<strong>" . $fileName . "</strong>" . " Did not upload due to error <br />";
                // header('location: uploads.php');
                //exit();
            }
        } else if (isset($response1['success']) && $response1['success'] == false) {
            $_SESSION['failure'] .= "<strong>" . $fileName . "</strong>" . " A conflict file found in local database <br />";
        } else {
            exit();
            $_SESSION['failure'] .= "<strong>" . $fileName . "</strong>" . " A technical error occured try again <br />";
        }
        // file uploaded succeeded
    } else {
        // exit();
        $_SESSION['failure'] .= "<strong>" . $fileName . "</strong>" . " A technical error occured try again <br />";
        // header('location: addfile.php');
        // exit();
    }
}

function get_details_from_endpoint($url, $headers, $postfields, $port) {


    // $out = array_values($details);
    //echo $details;
    echo $js = json_encode($postfields);


    $curl = curl_init();
    curl_setopt_array($curl, array(
        //curl_setopt ($curl, CURLOPT_CAINFO, dirname(__FILE__)."/cacert.pem"),
        //curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false),
        //CURLOPT_CAINFO=> dirname(__FILE__)."/cacert.pem",

        CURLOPT_SSL_VERIFYPEER => 0,
        CURLOPT_SSL_VERIFYHOST => false,
        CURLOPT_PORT => $port,
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

?>
