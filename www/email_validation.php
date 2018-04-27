<?php
/**
 * Created by PhpStorm.
 * User: school-station
 * Date: 4/24/18
 * Time: 5:11 PM
 */
include_once dirname(__FILE__) . '/Database/DBData.php';
$homepage = $_SERVER['DOCUMENT_ROOT'] . '/www/';
if (isset($_GET['email']))
{
    $email = $_GET['email'];
    $table = "submission_form"; // edit
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

header("location: " . $homepage . "?error=" . $error_status);