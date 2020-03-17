<?php

require_once './includes/config.php';


$db = getDbInstance();
$db->orderBy("id", "desc");
$uploads = $db->get("uploads");

$uno= $db->getValue ("uploads", "count(*)");


function getRecentUploads() {

    $db = getDbInstance();
    $db->join("results r", "u.id=r.upload_id");
    $db->where("r.artifact_id is null");
$db->orderBy("u.id", "desc");

//    $select = array("r.title as r_title", "r.membership_number as r_membership_no", "r.album as r_album", "r.stage_name as r_stage_name", "u.file", "u.title as u_title", "u.album as u_album", "u.membership_number as u_membership_no", "u.stage_name as u_stage_name", "u.artist as u_artist", "r.artist as r_artist", "u.title as u_title", "r.title as r_title", "r.artifact_id");
//  

 

    return $recentUploads = $db->get("uploads u",5);
}
 #$uploads=get_details_from_endpoint("http://192.168.1.243:9091/recognizer/api/uploads","9091");



//function get_details_from_endpoint($url, $port) {
//
//
//    // $out = array_values($details);
//    //echo $details;
//     // $js = json_encode($details);
//
//    $curl = curl_init();
//    curl_setopt_array($curl, array(
//        //curl_setopt ($curl, CURLOPT_CAINFO, dirname(__FILE__)."/cacert.pem"),
//        //curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false),
//        //CURLOPT_CAINFO=> dirname(__FILE__)."/cacert.pem",
//
//        CURLOPT_SSL_VERIFYPEER => 0,
//        CURLOPT_SSL_VERIFYHOST => false,
//        CURLOPT_PORT => $port,
//        CURLOPT_URL => $url,
//        CURLOPT_RETURNTRANSFER => true,
//        CURLOPT_ENCODING => "",
//        CURLOPT_MAXREDIRS => 10,
//        CURLOPT_TIMEOUT => 30,
//        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//        CURLOPT_CUSTOMREQUEST => "GET",
//      //  CURLOPT_POSTFIELDS => $js,
//        CURLOPT_HTTPHEADER => array(
//            "authorization: Basic YWRtaW46cGFzc3dvcmQ=",
//            "cache-control: no-cache",
//            "content-type: application/json"            
//        ),
//    ));
//
//     $response = curl_exec($curl);
//
//    $err = curl_error($curl);
//
//    curl_close($curl);
//
//    if ($err) {
//
//        echo "cURL Error #:" . $err;
//    } else {
//
//        return $response;
//    }
//}
?>
