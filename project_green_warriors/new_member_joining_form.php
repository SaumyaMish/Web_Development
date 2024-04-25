<!DOCTYPE HTML>  
<html>
    <head>
      <meta http-equiv="Refresh" content="3; url='new_member_joining_form.html'" />
        <style>
        .error {color: #FF0000;}
        </style>
    </head>
<body> 
</body>
</html>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{   
    if (empty($_POST["name"])) 
    {
      $name = "";
    } 
    else 
    {
        if (isset($_POST["name"]))
        {
            $name = test_input($_POST["name"]);
        }
    }

    if (empty($_POST["email"])) 
    {
        $emailErr = "Email is required";
    } 
    else
    {
        if (isset($_POST["email"]))
        {
            $email = test_input($_POST["email"]);
        }
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
        {
            $emailErr = "Invalid email format";
        }
    }

    if (empty($_POST["phone_no"])) 
    {
        $phone_noErr = "Phone no. is required";
    } 
    else 
    {
        if (isset($_POST["phone_no"]))
        {
            $phone_no = test_input($_POST["phone_no"]);
        }
        if (!preg_match("/^[0-9]*$/",$phone_no)) 
        {
            $phone_noErr = "Only numbers allowed";
        }
    }
    
    if (empty($_POST["activity"])) 
    {
        $activity = "";
    } 
    else 
    {

        if (isset($_POST["activity"]))
        {
            $activityarr=[];
            $activityarr=$_POST["activity"];
            $newvalues="";  
            foreach($activityarr as $chk1)  
            {  
                $newvalues .= $chk1.",";  
            }
        }
      
        if (empty($_POST["suggestion"])) 
        {
            $suggestion = "";
        } 
        else 
        {
            if (isset($_POST["suggestion"]))
            {
                $suggestion = test_input($_POST["suggestion"]);
            }
        }
        $insert="Insert into new_member_joining_form  values ('$name' , '$email',$phone_no, '$newvalues','$suggestion')";
        addtoDatabase($insert);
    }
  }

  function test_input($data) 
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  function addtoDatabase($value)
  {
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "greenwarriors_db";

      $connect = mysqli_connect($servername,$username,$password,$dbname);

      if ($connect)
      {
          echo '<p style = "color:red text-align:left;">Connection Stablish.</p>';
      }
      else
      {
          echo "Connection failed.".mysqli_connect_error();
      }

      $result= mysqli_query($connect , $value) ;
      if($result){
          echo "<h2>Updated</h2>";
      }
      else
      {
          echo "<h2 >Not updated</h2>";
      }
  }
?>