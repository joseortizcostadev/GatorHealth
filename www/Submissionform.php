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

?>