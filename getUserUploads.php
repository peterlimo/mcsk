<?php

require_once './includes/config.php';

$select = array("up.id","up.file","up.title","up.artist","u.name","up.created_at");

$db = getDbInstance();
$db->join("api_users u", "u.id=up.created_by");
$db->where("up.success",1);
$uploads = $db->get("uploads up",null,$select);


//$select = array("r.id","r.title as r_title", "r.membership_number as r_membership_no", "r.album as r_album", "r.stage_name as r_stage_name", "u.file", "u.title as u_title", "u.album as u_album", "u.membership_number as u_membership_no", "u.stage_name as u_stage_name", "u.artist as u_artist", "r.artist as r_artist", "u.title as u_title", "r.title as r_title", "r.artifact_id");
//$results = $db->get("results r", null, $select);

$db1 = getDbInstance();
$db->join("user_roles r", "r.user_id=u.id");
$db->join("roles rl", "rl.id=r.role_id");
$db->where("rl.name","ROLE_USER");
$users = $db->get("api_users u",null,array("u.id","u.name"));

function getRecentResults() {
    $db = getDbInstance();
    $db->join("uploads u", "u.id=r.upload_id");
    $db->where("r.artifact_id is not null");


    $select = array("r.id","r.title as r_title", "r.membership_number as r_membership_no", "r.album as r_album", "r.stage_name as r_stage_name", "u.file", "u.title as u_title", "u.album as u_album", "u.membership_number as u_membership_no", "u.stage_name as u_stage_name", "u.artist as u_artist", "r.artist as r_artist", "u.title as u_title", "r.title as r_title", "r.artifact_id");
  

    $db->orderBy('r.id', 'DESC');
    // $db->limit(5);

    return $recentResults = $db->get("results r", 5, $select);
}


?>
