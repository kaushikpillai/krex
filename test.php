<?php 
#echo $_SERVER['PHP_SELF'];
#echo "<br>";
# echo $_SERVER['SERVER_NAME'];
#echo "<br>";
#echo $_SERVER['HTTP_HOST'];
# echo "<br>";
#echo $_SERVER['HTTP_REFERER'];
#echo "<br>";
#echo $_SERVER['HTTP_USER_AGENT'];
#echo "<br>";
#echo $_SERVER['SCRIPT_NAME'];


#$age=array("Peter"=>"35","Ben"=>"37","Joe"=>"43");
#sort($age);print_r($age);echo "<br>";
#$age=array("Peter"=>"35","Ben"=>"37","Joe"=>"43");
#rsort($age);print_r($age);echo "<br>";
#$age=array("Peter"=>"35","Ben"=>"37","Joe"=>"43");
#asort($age);print_r($age);echo "<br>";
#$age=array("Peter"=>"35","Ben"=>"37","Joe"=>"43");
#ksort($age);print_r($age);echo "<br>";
#$age=array("Peter"=>"35","Ben"=>"37","Joe"=>"43");
#arsort($age);print_r($age);echo "<br>";
#$age=array("Peter"=>"35","Ben"=>"37","Joe"=>"43");
#krsort($age);print_r($age);echo "<br>";



?>

<!-- <html>
 <body>

 <form method="get" action="<?php echo $_SERVER['PHP_SELF'];?>">
 Name: <input type="text" name="fname">
 <input type="submit">
 </form>

<?php 
#$name = $_REQUEST['fname']; 
#echo $name; 
?>

 </body>
 </html> 
 
 <html>
 <body>

 <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
 Name: <input type="text" name="fname">
 <input type="submit">
 </form>

<?php 
$name = $_POST['fname']; 
echo $name; 
echo "<br />"; print_r ($_POST); echo "<br />";
print_r($_REQUEST);

?>

 </body>
 </html>

<html>
 <body>

 <a href="test.php?subject=PHP&web=W3schools.com">Test $GET</a>

 </body>
 </html>
 <?php 
#echo "Study " . $_GET['subject'] . " at " . $_GET['web'];
?>

<html>
 <body>

 <form action="test.php" method="post">
 Name: <input type="text" name="name"><br>
 E-mail: <input type="text" name="email"><br>
 <input type="submit">
 </form>
 <?php
     echo "<br />";echo $_POST['name'];echo "<br />";
     echo "<br />";echo $_POST['email'];echo "<br />";
 
 ?>

 </body>
 </html>-->
 
 
 <html>
 <style>
.error {color: #FF0000;}
</style>
 <body>
 <?php
  // define variables and set to empty values
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed"; 
    }
  }

  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address syntax is valid
    if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email)) {
      $emailErr = "Invalid email format"; 
    }
  }

  if (empty($_POST["website"])) {
    $website = "";
  } else {
    $website = test_input($_POST["website"]);
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
      $websiteErr = "Invalid URL"; 
    }
  }

  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
}
 ?>
 <p><span class="error">* required field.</span></p><br>
 <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  Name: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br>
  
 E-mail: <input type="text" name="email" value="<?php echo $email;?>">
 <span class="error">* <?php echo $emailErr;?></span>
 <br>
Website: <input type="text" name="website"  value="<?php echo $website;?>">
<span class="error"><?php echo $websiteErr;?></span>
   <br><br>
Comment: <textarea name="comment" rows="5" cols="40"><?php echo $comment;?></textarea><br>
Gender:
<input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female</input>
<input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male</input>
<span class="error">* <?php echo $genderErr;?></span>
   <br>
<input type="submit">
</form>

<?php
// define variables and set to empty values
$name = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = test_input($_POST["name"]);
  $email = test_input($_POST["email"]);
   $website = test_input($_POST["website"]);
  $comment = test_input($_POST["comment"]);
  $gender = test_input($_POST["gender"]);
  
  echo "<br />";echo $name; echo "<br />";echo $email;echo "<br />"; echo $website;echo "<br />"; echo $comment;echo "<br />"; echo $gender;
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
 }
 

?>
 </body>
 </html>
 


