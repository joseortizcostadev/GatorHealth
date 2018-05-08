<?php
/*
   This file takes the submission form
 */
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once dirname(__FILE__) . '/Database/DBData.php';
$error_status = 0;
$local_homepage = "GatorHome.php";
$server_homepage = "";
$submission_form_page = $_SERVER['DOCUMENT_ROOT'] . '/www/SignUpG.php';
$validation_page = "http://localhost/GatorHealth/www/email_validation.php";

if (isset($_POST['submit']) && $_POST['submit'] != null)
{
  
    
    
    $org_name = $_POST["org_name"]; // edit
    $org_description = $_POST["org_description"]; // edit
    $p_checkbox = $_POST["check_list"]; // working
    $or_location = $_POST["or_location"]; // edit
    $r_number = $_POST ["r_number"]; // edit
    $o_hours = $_POST["o_hours"]; // edit
    $s_by = $_POST["s_by"]; //edit
    
    // join values from checkbox
    $orgs_selected = $p_checkbox[0];
    foreach ($p_checkbox as $organization) {
        if ($organization != $orgs_selected) {
            $orgs_selected .= ", " . $organization;
        }
    }
    
    // checks if any field is empty.
    $field_empty = (empty($org_name) || empty($org_description) || empty($p_checkbox) || empty($or_location) || empty($r_number) || empty($o_hours) || empty($s_by) );
    $validation_errors = 0;
    if ($field_empty)
        $validation_errors = 4; // a field is empty
    if (strlen($org_description) > 250)
        $validation_errors = 5; // description is more than 250 chars
    /* here goes the code for error 6 which corresponds to the hours field validation */
    if (!filter_var($s_by, FILTER_VALIDATE_EMAIL))
        $validation_errors = 7; // email is not validated
    if ($validation_errors > 0) {
        $form_data = array($org_name, $org_description, $p_checkbox, $or_location, $r_number, $o_hours, $s_by);
        $_SESSION['form_data'] = $form_data;
        header("Location: SignUpG.php?error=" . $validation_errors); // error 4 some field is empty
        exit();
    }
        
    
    $url = $validation_page . "?email=" . $s_by;
    $subject = "GatorHeath confirmation email, "; // edit
    $message = "GatorHealth would like to thank you for submitting your organization, please Clink on the link to confirm your organizatations participation in GatorHealth" . $url . " Thank you!"; // edit
    
    
  if (1){//mail($s_byName, $subject, $message)) {
    
        //echo $s_byName . " "  . " " . $subject . " " . $message;
        // insert in database id, email, timestamp, status=[0=not_validated, 1=validated, 2=invalid]
        $date = new DateTime();
        $timestamp = $date->getTimestamp();
        $database = new DBData();
        $table = "email_validation"; // edit. change according to the name you choose in db for your table
        $fields = array("email", "timestamp", "status"); // remember to create id in table and set to auto increment
        $values = array($s_by, $timestamp, 0);

        // insert validation url data.
        if ($database->insert($table, $fields, $values))
        {
            // insert in database submission form values
            $table = "submission_form";
            $fields = array("org_name", "org_description", "r_number", "o_hours", "s_by", "p_checkbox", "or_location"); // edit. fields same as table fields
            $values = array($org_name, $org_description, $r_number, $o_hours, $s_by,  $orgs_selected, $or_location); // edit accordenly to the fields above

            if ($database->insert($table, $fields, $values)) { //
                // data was inserted redirect to any page you need
                $error_status = 0;
            }

        }
        else { // data failed to be inserted. Need to show error message
            $error_status = 1;
        }
        

    }
    else{ // email not sent
       $error_status = 2;
    }

}
else {
    $error_status = 3; // form was not submitted
}

if  ($error_status == 0) // everything went as expected then redirect to home page
{
    header("location: GatorHome.php");
}
else{
    header("location: SignUpG.php" . "?error=" . $error_status);
}
?>
