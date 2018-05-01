<?php
/*
   This file takes the submission form
 */

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once dirname(__FILE__) . '/Database/DBData.php';
$error_status = 0;
$local_homepage = "GatorHome.php";
$server_homepage = "";
$submission_form_page = $_SERVER['DOCUMENT_ROOT'] . '/www/SignUpG.php';
$validation_page = "http://localhost:8080/GatorHealth/www/email_validation.php";

if (isset($_POST['submit']) && $_POST['submit'] != null)
{
    
    
    $org_name = $_POST["org_name"]; // edit
    $org_description = $_POST["org_description"]; // edit
    $p_checkbox = $_POST["check_list"]; // working
    $or_location = $_POST["or_location"]; // edit
    $r_number = $_POST ["r_number"]; // edit
    $o_hours = $_POST["o_hours"]; // edit
    $s_byName = $_POST["s_byName"]; //edit

    // join values from checkbox
    $orgs_selected = $p_checkbox[0];
    foreach ($p_checkbox as $organization) {
        if ($organization != $orgs_selected) {
            $orgs_selected .= ", " . $organization;
        }
    }

    $headers = array("From: from@example.com",
        "Reply-To: replyto@example.com",
        "X-Mailer: PHP/" . PHP_VERSION
    );
    $headers = implode("\r\n", $headers);
    $url = $validation_page . "?email=" . $s_byName;
    $subject = "GatorHeath confirmation email, "; // edit
    $message = "GatorHealth would like to thank you for submitting your organization, please Clink on the link to confirm your organizatations participation in GatorHealth" . $url . " Thank you!"; // edit

   
    if (mail($s_byName, $subject, $message, $headers)) {
        //echo $s_byName . " "  . " " . $subject . " " . $message;
        // insert in database id, email, timestamp, status=[0=not_validated, 1=validated, 2=invalid]
        $date = new DateTime();
        $timestamp = $date->getTimestamp();
        $database = new DBData();
        $table = "email_validation"; // edit. change according to the name you choose in db for your table
        $fields = array("email", "timestamp", "status"); // remember to create id in table and set to auto increment
        $values = array($s_byName, $timestamp, 0);

        // insert validation url data.
        if ($database->insert($table, $fields, $values))
        {
            // insert in database submission form values
            $table = "SubmissionForm";
            $fields = array("org_name", "org_description", "r_number", "o_hours", "s_by", "p_checkbox", "or_location"); // edit. fields same as table fields
            $values = array($org_name, $org_description, $r_number, $o_hours, $s_byName,  $orgs_selected, $or_location); // edit accordenly to the fields above

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
    $error_status = 3;
}

if  ($error_status == 0) // everything went as expected then redirect to home page
{
    header("location: GatorHome.php" . "?error=" . $error_status);
}
else{
    header("location: SignUpG.php" . "?error=" . $error_status);
}

