postFile.php

<?php
include_once('includes/config.php');
session_start();
$targetdir = 'uploads/';
$filename = $_FILES['file']['name'];
$filename = preg_replace("/[^A-Za-z0-9- .]/", '', $filename);
// name of the directory where the files should be stored
$targetfile = $targetdir . $filename;
$file = __DIR__ . "/uploads/'$filename'";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (move_uploaded_file($_FILES['file']['tmp_name'], $targetfile)) {

    //
    //check if exists
    //
    //
    //
    //
  $dbResults = queryDb($file);

//print_r($dbResults[0][3]);exit();

    if (isset($dbResults[0][3]) && $dbResults[0][3] != 'null') {
        //data exists
        echo $_SESSION['failure'] .= "A conflict file found in local database <br />";

        //$filename = 'C:\Users\user\Documents\Sample Music\ALEX WAWERU\01-Alex Waweru-Tamu tamu.mp3';
// include getID3() library (can be in a different directory if full path is specified)
        require_once('getid3/getid3.php');

        $metaDir = '/opt/panako/metadata/';

// Initialize getID3 engine
        $getID3 = new getID3;

        // Analyze file and store returned data in $ThisFileInfo
        $ThisFileInfo = $getID3->analyze($targetfile);
        $getID3->CopyTagsToComments($ThisFileInfo);
        $id = getFileIdentifier($filename);
        unset($ThisFileInfo['comments']['picture']);

        $stored = file_put_contents($metaDir . $id . '.json', json_encode($ThisFileInfo['comments']));
        if ($stored) {
//print_r($ThisFileInfo);exit();
            $uploadId = saveUpload($ThisFileInfo['comments'], null, $file);
            if (isset($uploadId)) {

                foreach ($dbResults as $conflict) {
                    $uploaded = saveResults($ThisFileInfo['comments'], $conflict, $uploadId);
                }
            } else {
                $_SESSION['failure'] .= "An error occured when saving to results <br />";
            }
        } else {
            echo $_SESSION['failure'] .= "An error occured when saving metadata <br />";
        }


        //getStoreMeta($file);
    } else if (isset($dbResults[0][3]) && $dbResults[0][3] == 'null') {
        //store the file

        $result = array();

        exec('panako store ' . $file . '', $result);
//print_r($result);exit();
        if (!empty($result)) {

            //$filename = 'C:\Users\user\Documents\Sample Music\ALEX WAWERU\01-Alex Waweru-Tamu tamu.mp3';
// include getID3() library (can be in a different directory if full path is specified)
            require_once('getid3/getid3.php');

            $metaDir = '/opt/panako/metadata/';

// Initialize getID3 engine
            $getID3 = new getID3;

            // Analyze file and store returned data in $ThisFileInfo
            $ThisFileInfo = $getID3->analyze($targetfile);
            $getID3->CopyTagsToComments($ThisFileInfo);
            unset($ThisFileInfo['comments']['picture']);
            print_r($ThisFileInfo['comments']);
            $id = getFileIdentifier($filename);
            if ($id == null) {
                $_SESSION['failure'] .= "An error occured when getting fingerprint id <br />";
            } else {
                $stored = file_put_contents($metaDir . $id . '.json', json_encode($ThisFileInfo['comments']));
                if ($stored) {
                    //save to db
                    $uploadId = saveUpload($ThisFileInfo['comments'], $result['1'], $file);

                    if (isset($uploadId)) {

                        $_SESSION['success'] = "Processed successfully <br />";
                    } else {
                        $_SESSION['failure'] .= "An error occured when saving to uploads <br />";
                    }
                } else {
                    echo $_SESSION['failure'] .= "An error occured when saving metadata <br />";
//exit();
                }
            }
        } else {
            $_SESSION['failure'] .= "An error occured when saving fingerprint <br />";
        }
    } else {
        $_SESSION['failure'] .= "An error occured when querying the database for matches <br />";
    }

    header('location: addfile.php');
    exit();
} else {

    $_SESSION['failure'] .= "A technical error occured try again <br />";
    header('location: addfile.php');
    exit();
}

//query db
function queryDb($file) {
    $result = array();

//    $file = __DIR__ . "/" . $targetfile;
    exec('panako query ' . $file . '', $result);
//print_r($result);exit();
    //remove keys


    if (empty($result)) {
        $_SESSION['failure'] .= "Failed to query db <br />";

        header('location: addfile.php');

        exit();
    } else {
        unset($result[0]);
    }

    if (!empty($result)) {
        $matches = array();
        foreach ($result as $res) {
            //results found
            $ress = explode(';', $res);
            array_push($matches, $ress);
        }
        return $matches;
    } else {
        return true;
    }
}

function saveUpload($data, $duration, $fileName) {
//Array ( [album] => Array ( [0] => TAMU TAMU ) [artist] => Array ( [0] => Alex Waweru ) [band] => Array ( [0] => Alex Waweru; ) [title] => Array ( [0] => Tamu tamu ) [track_number] => Array ( [0] => 1 ) [year] => Array ( [0] => 1998 ) )
    $data_to_store = array();

    if (isset($data['artist'])) {
        $data_to_store['artist'] = implode(',', $data['artist']);
    }

    if (isset($data['album'])) {
        $data_to_store['album'] = implode(',', $data['album']);
    }


    if (isset($data['title'])) {
        $data_to_store['title'] = implode(',', $data['title']);
    }


    if (isset($data['band'])) {
        $data_to_store['band'] = implode(',', $data['band']);
    }

    if (isset($data['track_number'])) {
        $data_to_store['track'] = implode(',', $data['track_number']);
    }
    if (isset($data['year'])) {
        $data_to_store['year'] = implode(',', $data['year']);
    }


    $data_to_store['duration'] = $duration;
    $data_to_store['stage_name'] = $_POST['stageName'];
    $data_to_store['membership_number'] = $_POST['memberNo'];
    $data_to_store['file'] = $fileName;
    $data_to_store['acr_id'] = getFileIdentifier($fileName);
    $data_to_store['created_by'] = $_SESSION['user_logged_in'];
    $data_to_store['updated_by'] = $_SESSION['user_logged_in'];
    $data_to_store['created_at'] = date('Y-m-d H:i:s');
    $data_to_store['updated_at'] = date('Y-m-d H:i:s');

    #print_r($data_to_store);exit();
    $db = getDbInstance();

//print_r($data_to_store);exit();
    $last_id = $db->insert('uploads', $data_to_store);

    if (isset($last_id)) {
        return $last_id;
    } else {
        return null;
    }
}

function saveResults($datapassed, $conflict, $uploadId) {
//Array ( [album] => Array ( [0] => TAMU TAMU ) [artist] => Array ( [0] => Alex Waweru ) [band] => Array ( [0] => Alex Waweru; ) [title] => Array ( [0] => Tamu tamu ) [track_number] => Array ( [0] => 1 ) [year] => Array ( [0] => 1998 ) )
    $data_to_store = array();
    $data = json_decode(file_get_contents('/opt/panako/metadata/' . $conflict[3] . '.json'), true);
#print_r($data);exit();
    #  if (isset($data)) {
    #      $data = $data;
    # } else {
    #    $data = $datapassed;
    #}
    if (isset($data['artist'])) {
        $data_to_store['artist'] = implode(',', $data['artist']);
    }

    if (isset($data['album'])) {
        $data_to_store['album'] = implode(',', $data['album']);
    }


    if (isset($data['title'])) {
        $data_to_store['title'] = implode(',', $data['title']);
    }


    if (isset($data['band'])) {
        $data_to_store['band'] = implode(',', $data['band']);
    }

    if (isset($data['track_number'])) {
        $data_to_store['track'] = implode(',', $data['track_number']);
    }
    if (isset($data['year'])) {
        $data_to_store['year'] = implode(',', $data['year']);
    }


    $data_to_store['stage_name'] = $_POST['stageName'];
    $data_to_store['membership_number'] = $_POST['memberNo'];


    $data_to_store['play_offset'] = $conflict[2];
    $data_to_store['file'] = $conflict[4];
    $data_to_store['artifact_id'] = $conflict[3];
    $data_to_store['duration'] = $conflict[6];
    $data_to_store['upload_id'] = $uploadId;
    $data_to_store['created_by'] = $_SESSION['user_logged_in'];
    $data_to_store['updated_by'] = $_SESSION['user_logged_in'];
    $data_to_store['created_at'] = date('Y-m-d H:i:s');
    $data_to_store['updated_at'] = date('Y-m-d H:i:s');


    $db = getDbInstance();
    $last_id = $db->insert('results', $data_to_store);
//print_r($db->mysqli()->error);
//print_r($db->_stmtError);
//print_r($data_to_store);exit();
    if (isset($last_id)) {
        return $last_id;
    } else {
        $_SESSION['failure'] .= "An error occured when saving results  <br />";
        return null;
    }
}

function getFileIdentifier($filename) {
    $result = array();
    //   $filename = '/uploads/imani.mp3';
    exec("panako resolve  '$filename'", $result);
//print_r($result);exit();
    if (!empty($result)) {
        return $result[0];
    } else {
        return null;
    }
}
?>












