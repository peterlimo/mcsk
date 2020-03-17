<?php
require_once './includes/config.php';
$id=$_GET['id'];
//echo get_details_from_endpoint("http://localhost:8080/recognizer/api/results/".$id,"8080");
$db = getDbInstance();

$db->where("upload_id", $id);
$uploads = $db->get("results");
echo json_encode($uploads);

function get_details_from_endpoint($url, $port) {


    // $out = array_values($details);
    //echo $details;
     // $js = json_encode($details);

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
        CURLOPT_CUSTOMREQUEST => "GET",
      //  CURLOPT_POSTFIELDS => $js,
        CURLOPT_HTTPHEADER => array(
            "authorization: Basic YWRtaW46cGFzc3dvcmQ=",
            "cache-control: no-cache",
            "content-type: application/json"            
        ),
    ));

     $response = curl_exec($curl);

    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {

        echo "cURL Error #:" . $err;
    } else {

        return $response;
    }
}
?>