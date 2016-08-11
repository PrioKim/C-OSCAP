<?php

$DB['host'] = 'localhost';
$DB['db'] = 'SCDC';
$DB['id'] = 'root';
$DB['pw'] = 'realppp';
$mysqli=new mysqli($DB['host'], $DB['id'], $DB['pw'], $DB['db']);
$mysqli->set_charset("utf8");
if(mysqli_connect_error()){
    exit('Connect Error (' . mysqli_connect_errno() . ') '. mysqli_connect_error());
}

extract($_POST);
extract($_GET);

?>
