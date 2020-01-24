<?php
//SERVER
$serverConn = array(
    "S1" => array("10.128.50.12\WAWISVR2, 20147","w3bU$3R0001","!JSIwEb0001"), 
    //"S2" => array("10.128.50.12\SINT5021, 52150","sa","itgd@2017"), 
    "S2" => array("10.128.50.13\SINT5021, 62046","sa","itgd@2017"),
    //"S3" => array("10.128.50.12\SUAT5021, 51517","dbadmin003","kh@JSI123"), 
    "S3" => array("10.128.50.11\SUAT5021, 52705","w3bU$3R0001","!JSIwEb0001"),
    "S4" => array("10.128.50.12\SUAT5021, 51517","w3bU$3R0001","!JSIwEb0001"));


define('SQL_CONN', base64_encode(serialize($serverConn['S1'])),true);
define('SQL_CONN_SINT', base64_encode(serialize($serverConn['S2'])),true);
define('SQL_CONN_UAT', base64_encode(serialize($serverConn['S3'])),true);
define('SQL_CONN_UAT_WEB', base64_encode(serialize($serverConn['S4'])),true);

define('SSYS_ENV','prod');
define('SSYS_ENV_UAT','test');

define('APP_URL','https://10.128.50.41/project123/',true);
?>