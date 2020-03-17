<?php 
$results=Array();
exec("panako client 'localhost:8080' /var/www/html/mcsk/uploads/2.mp3",$results);
print_r($results);
