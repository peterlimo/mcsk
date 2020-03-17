<?php

require_once './includes/config.php';
## Read value
$draw = $_POST['draw'];
$row = $_POST['start'];
$rowperpage = $_POST['length']; // Rows display per page
$columnIndex = $_POST['order'][0]['column']; // Column index
$columnName = $_POST['columns'][$columnIndex]['data']; // Column name
$columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
$searchValue = $_POST['search']['value']; // Search value
## Custom Field value
$searchByGender = $_POST['searchByGender'];

## Search 
$searchQuery = " ";
$db3 = getDbInstance();



## Total number of records without filtering
$db1 = getDbInstance();
$db1->where("success", 1);
$totalRecords = $db1->getValue("uploads", "count(*)");


## Total number of records with filtering




$select = array("up.id", "up.file", "up.title", "up.artist", "u.name", "up.created_at");
$db3->join("api_users u", "u.id=up.created_by");
if ($searchByGender !== '') {
    $db3->where("u.id", $searchByGender);
}
if ($searchValue !== '') {
    foreach ($select as $value) {
         $value;
      $db3->orWhere($value, $searchValue, 'LIKE');
    }
    
}
$db3->where("up.success", 1);

$db3->orderBy($columnName, $columnSortOrder);
$uploads = $db3->get("uploads up", null, $select);

 $totalRecordwithFilter = $db3->count;


## Fetch records
$data = '';
foreach ($uploads as $row) {
    $data[] = array(
        "file" => $row['file'],
        "artist" => $row['artist'],
        "title" => $row['title'],
        "created_at" => date("d-m-Y", strtotime($row['created_at'])),
        "name" => $row['name']
    );
}

## Response
$response = array(
    "draw" => intval($draw),
    "iTotalRecords" => $totalRecords,
    "iTotalDisplayRecords" => $totalRecordwithFilter,
    "aaData" => $data
);

echo json_encode($response);
