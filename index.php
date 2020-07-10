<?php
include_once 'application/common/Helpers.php'; // [Para todo]
include_once 'application/includes/variables_db.php';
include_once 'application/common/Mysqli.php';
include_once 'application/includes/DataLogin.php';
$db = new dbConn();
$seslog = new Login();
$seslog->sec_session_start();

$_SESSION["last_url"] = HOST_URL . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];

if ($seslog->login_check() == TRUE) {
    include_once 'catalog/index.php';
} else {

    include_once 'catalog/index.php';
}

$db->close();
?>