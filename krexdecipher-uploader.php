<html>
<head>
    <title>krexdecipher!!!</title>
    <link rel="stylesheet" type="text/css" href="krexipher-style.css">
  </head>
<body>


<form action="krexdecipher.php" method="post" enctype="multipart/form-data">
<label class="texts" for="file">Upload the text file to be decoded:</label>
<input type="file" name="file" id="file"><br>
<h5 class="warning"> Only '.txt' files allowed!!</h5>
<input class="button" type="submit" name="submit" value="Decode">
</form>
</body>
<!--<?php
print_r($_FILES);
?>-->
<?php
  $allowedExts = array("txt");
  $temp = explode(".", $_FILES["file"]["name"]);
  $extension = end($temp);

  // http://en.wikipedia.org/wiki/Post/Redirect/Get --> prevent reposting while refreshing the browser
  if ( !empty( $_FILES ) )
  {
    if ((($_FILES["file"]["type"] == "text/plain")) && ($_FILES["file"]["size"] < 90000) && in_array($extension, $allowedExts)) 
    {
      if ($_FILES["file"]["error"] > 0) 
      {
        echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
      } 
      else 
      {
        //echo "Upload: " . $_FILES["file"]["name"] . "<br>";
        //echo "Type: " . $_FILES["file"]["type"] . "<br>";
        //echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
        //echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";
        if (file_exists("/var/www/krex/krexdecipher-uploads/" . $_FILES["file"]["name"])) 
        {
          unlink("/var/www/krex/krexdecipher-uploads/" . $_FILES["file"]["name"]);
          //echo $_FILES["file"]["name"] . " already exists. ";
        } 
        //else 
        //{
          move_uploaded_file($_FILES["file"]["tmp_name"], "/var/www/krex/krexdecipher-uploads/" . $_FILES["file"]["name"]);
          //echo "Stored in: " . "/var/www/krex/krexdecipher-uploads/" . $_FILES["file"]["name"];
        //}
      }
    } 
    else 
    {
      echo "<h3 class=\"warning\">*** Please upload a valid file!!! ***</h3>" ;
    }
  }  
  $myFile = "/var/www/krex/krexdecipher-uploads/" . $_FILES["file"]["name"];
  $fh = fopen($myFile, 'r');
  $theData = fread($fh, filesize($myFile));
  fclose($fh);
  //echo $theData;
  
?>
</html> 
