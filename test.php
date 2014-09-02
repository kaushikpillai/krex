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
 <body>
 <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  Name: <input type="text" name="name"><br>
 E-mail: <input type="text" name="email"><br>
Website: <input type="text" name="website"><br>
Comment: <textarea name="comment" rows="5" cols="40"></textarea><br>
Gender:
<input type="radio" name="gender" value="female">Female</input>
<input type="radio" name="gender" value="male">Male</input>
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
 


