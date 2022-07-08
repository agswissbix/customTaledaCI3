<?php
$serverName = "NB-GALLI"; //serverName\instanceName
$connectionInfo = array( "Database"=>"Winteler_data.bak", "UID"=>"sa", "PWD"=>"Manager2018.");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

if( $conn ) {
     echo "Connection established.<br />";
}else{
     echo "Connection could not be established.<br />";
     die( print_r( sqlsrv_errors(), true));
}
?>