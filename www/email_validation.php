<?php
/**
 * Created by PhpStorm.
 * User: school-station
 * Date: 4/24/18
 * Time: 5:11 PM
 */
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once dirname(__FILE__) . '/Database/DBData.php';
$homepage = dirname(__FILE__) . '/www/';
if (isset($_GET['email']))
{
    $email = $_GET['email'];
    $table = "email_validation"; // edit
    $field_to_update = "status";
    $status = 1;
    $email_field = "email";
    $database = new DBData();
    if ($database->update($table, $field_to_update, $status, $email_field, $email)) {
        // redirect to home page, error_status = 0
        $error_status = 0;
    }
    else { // the status in database failed to be updated. = 1
       $error_status = 1;
    }
}
else { // email was modified in url. Error status=2
    $error_status=2;
}

if ($error_status == 0)
    echo "<h1> Email Successfully Validated </h1>";
else
    echo "<h1> Email not Validated </h1>";
?>