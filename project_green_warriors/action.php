<?php
// define variables and set to empty values
require("connection.php");

$email="";

// $emailErr  = $phone_noErr = $contributionErr = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{   
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
      echo $emailErr; 
    }

  }
  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  
  $query = "INSERT INTO email_form VALUES('$email')";
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