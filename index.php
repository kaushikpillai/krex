<html>
  <head>
    <title>Welcome to krex.com!</title>
  </head>
  <body>
    <?php include 'header.php';?>
    <br />
    <h1 class="texts" id="heading"> Welcome to KREXIPHER!!! </h1>
    <p class="texts" id="heading"> You can <b>encode</b> and <b>decode</b> text files using the <b><i>'krex cipher'</i></b> encryption!!! </p>
    <br />
    <div class="logo">
    <img id="krexlogo"src="red-dragon.jpg">
    </div>
    <!--<?php include 'kau.php';?>
    <?php include 'krexipher-uploader.php';?>-->
    <br />
    <?php include 'krexipher.php';?>
    <br />
    <?php /*print"<table border=0>";
    foreach ($_SERVER as $key=>$val )
       {
         echo "<tr><td>".$key."</td><td>" .$val."</tr>";
        }
    print"</table>";*/
 ?>
    <!--<br /><br />-->
    <?php include 'krexdecipher.php';?>
    <?php include 'footer.php';?>
    
  </body>
</html>
