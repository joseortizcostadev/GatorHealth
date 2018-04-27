<?php
/*
   This file takes the submission form
 */
include_once dirname(__FILE__) . '/Database/DBData.php';
$error_status = 0;
$homepage = "http://localhost:8080/GatorHealth/www/";
$submission_form_page = $_SERVER['DOCUMENT_ROOT'] . '/www/SignUpG.php';
$validation_page = "http://localhost:8080/GatorHealth/www/email_validation.php";

if (isset($_POST['submit']) && $_POST['submit'] != null)
{
    
    
    $org_name = $_POST["org_name"]; // edit
    $org_description = $_POST["org_description"]; // edit
    $p_checkbox = $_POST["p_checkbox"]; // working
    $or_location = $_POST["or_location"]; // edit
    $r_number = $_POST ["r_number"]; // edit
    $o_hours = $_POST["o_hours"]; // edit
    $s_byName = $_POST["s_byName"]; //edit
    
    //echo $s_byName;
             
    
                         
    
    $url = $validation_page . "email=" . $s_byName;
    $subject = "GatorHeath confirmation email, "; // edit
    $message = "GatorHealth would like to thank you for submitting your organization, please Clink on the link to confirm your organizatations participation in GatorHealth" . $url . " Thank you!"; // edit

   
    if (mail($s_byName, $subject, $message))
    {
         //echo $s_byName . " "  . " " . $subject . " " . $message;
        // insert in database id, email, timestamp, status=[0=not_validated, 1=validated, 2=invalid]
        $date = new DateTime();
        $timestamp = $date->getTimestamp();
        $database = new DBData();
        $table = "submission_form"; // edit. change according to the name you choose in db for your table
        $fields = array("org_name", "org_description", "r_number", "o_hours", "s_by", "p_checkbox", "or_location", "s_byName"); // remember to create id in table and set to auto increment
        $values = array($s_byName, $timestamp,0 );
        
        // insert validation url data.
        if ($database->insert($table, $fields, $values))
        {
            // insert in database submission form values
            $fields = array("org_name", "org_description", "r_number", "o_hours", "s_by", "p_checkbox", "or_location", "s_byName"); // edit. fields same as table fields
            $values = array($org_name, $org_description, $p_checkbox, $or_location, $r_number, $o_hours, $s_byName ); // edit accordenly to the fields above

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


     if  ($error_status == 0) // everything went as expected then redirect to home page
     {
         header("location: " . $homepage . "/error=" . $error_status);
     }
     // some error ocurred. Check for error status.
     //header("location: " . $homepage . "?error=" . $error_status);
     
}

