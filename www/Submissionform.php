
<?php		

if (isset($_POST['submit']) && $_POST['submit'] != null)
{
    $email = $_POST['email'];
    $last_name = $_POST['last_name'];
    echo $email . " " . $lastname;
    
    $subject = "Some subject";
    $message = "Validation link: " . "http://file:///Users/mariacontreras/Desktop/SignUpG.html?email=" . $email ;
    
    if (mail($email, $subject, $message))
    {
        // go to databse and insert timestamp, and status=0
    }
}

=======
<?php
/*
   This file takes the submission form
 */
include_once dirname(__FILE__) . '/Database/DBData.php';
$error_status = 0;
$homepage = $_SERVER['DOCUMENT_ROOT'] . '/www/';
$submission_form_page = $_SERVER['DOCUMENT_ROOT'] . '/www/SignUpG.php';
$validation_page = $_SERVER['DOCUMENT_ROOT'] . '/www/email_validation.php';
if (isset($_POST['submit']) && $_POST['submit'] != null)
{
    $email = $_POST['email'];
    $lastname = $_POST['lastname'];
    $name = "org_name"; // edit
    $description = "org_description"; // edit
    $organization_type = "p_checkbox" array(); //edit
    $location = "or_location"; // edit
    $room = "r_number"; // edit
    $hours = "o_hours"; // edit
    $Submitted = "s_byName"; //edit


    $url = $validation_page . "email=" . $email;
    $subject = "GatorHeath confirmation, "; // edit
    $message = "GatorHealth would like to thank you for submitting your organization, please Clink on the link to confirm your organizatation" . $url . " Thank you!"; // edit


    if (mail($email, $subject, $message))
    {
        // insert in database id, email, timestamp, status=[0=not_validated, 1=validated, 2=invalid]
        $date = new DateTime();
        $timestamp = $date->getTimestamp();
        $database = new DBData();
        $table = "submission_table"; // edit. change according to the name you choose in db for your table
        $fields = array("email", "timestamp", "status"); // remember to create id in table and set to auto increment
        $values = array($email, $timestamp, 0);
        // insert validation url data.
        if ($database->insert($table, $fields, $values))
        {
            // insert in database submission form values
            $fields = array("organization", "last_name"); // edit. fields same as table fields
            $values = array($organization, $lastname); // edit accordenly to the fields above

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
     header("location: " . $submission_form_page . "/error=" . $error_status);
}

?>