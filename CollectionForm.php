<!DOCTYPE html>

<html>
<head>
    <title>Registration Form</title>
    <style>
        body{
            
            background-color: "#DCDCDC";
        }
    </style>
</head>
<body bgcolor="#DCDCDC">

<!-- PHP functions -->
<?php
$FnameErr = $LnameErr= $emailErr =  $genderErr = "";
$Fname = $Lname = $email = $gender  = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["Fname"])) {
    $FnameErr = " First Name is required";
  } else {
    $Fname = test_input($_POST["Fname"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$Fname)) {
      $FnameErr = "Only letters and white space allowed";
    }
  }

  if (empty($_POST["Lname"])) {
    $LnameErr = " Last Name is required";
  } else {
    $Lname = test_input($_POST["Lname"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$Lname)) {
      $LnameErr = "Only letters and white space allowed";
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
   
  }
  

  
  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>

<!-- //html form// -->
    <center>
        <h2>Registration Form</h2>
       
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
 First Name: <input type="text" name="Fname">
  <span class="error" style="color:red">   <?php echo $FnameErr;?></span>
  <br><br>
 Last Name: <input type="text" name="Lname">
  <span class="error"style="color:red">  <?php echo $LnameErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email">
  <span class="error" style="color:red"> * <?php echo $emailErr;?></span>
  <br><br>
 
  Gender:
  <input type="radio" name="gender" value="female">Female
  <input type="radio" name="gender" value="male">Male
  <input type="radio" name="gender" value="other">Other
  <span class="error" style="color:red"> *  <?php echo $genderErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>
   
    <center>

</body>
</html>