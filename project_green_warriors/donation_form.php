<!DOCTYPE HTML>  
<html>
    <head>
    <meta http-equiv="Refresh" content="3; url='donate_now.html'" />
        <style>
        .error {color: #FF0000;}
        p 
        {
            color:blue;
            font-size:34px; 
            text-align:center;
        }
        </style>
    </head>
<body> 
    
</body>
</html>

<?php
// define variables and set to empty values
require("connection.php");

$name = $email =$phone_no= $contribution="";

// $emailErr  = $phone_noErr = $contributionErr = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{   
    if (empty($_POST["name"])) 
    {
      $name = "";
    } 
    else 
    {
        $name = test_input($_POST["name"]);
    }

    // isset() : check whether the input is given or not
    if (isset($_POST["email"]))
    {
        $email = test_input($_POST["email"]);    
      // check if e-mail address is well-formed
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
      {
          $emailErr = "Invalid email format";
      }
    } 
    else
    {
      $emailErr = "Email is required";  
    }

    if (empty($_POST["phone_no"])) 
    {
      $phone_noErr = "Phone no. is required";
    } 
    else 
    {
      $phone_no = test_input($_POST["phone_no"]);

      if (!preg_match("/^[0-9]*$/",$phone_no)) 
      {
        $phone_noErr = "Only numbers allowed";
        echo $phone_noErr;
      }
    }
      
  
    if (empty($_POST["contribution"])) 
    {
      $contribution = "Contribution is required";
    } 
    else 
    {
      $contribution = test_input($_POST["contribution"]);
    }
  }
  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  
  $query = "INSERT INTO donation_form VALUES('$name','$email','$phone_no','$contribution')";
  $data = mysqli_query($connect,$query);
  if($data)
  {
    echo "<p style='color:blue;font-size:34px; text-align:center;'>Data inserted.....</p>";
  }
  else
  {
    echo "<p style='color:blue; font-size:34px; text-align:center;'>Data not  inserted! <br/> Please fill details properly. </p>";
  }
?> 