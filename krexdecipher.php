<?php

include 'krexdecipher-uploader.php';

    $value =  trim($theData);
    
    //echo "<br />";echo $value;echo "<br />";
    
    //replace the letters according to the cipher
    $value = str_replace("$"," ", $value); // replace space
      
    // replace iverted comma's
    $value = str_replace("<","'", $value);
    $value = str_replace(">","\"", $value);
      
    //replace the alphabets
    //ordered in such a way that the decryption is not proper.
    $value = str_replace("/-\\","a", $value);
    $value = str_replace("|))","b", $value);
    $value = str_replace("|)\\","r", $value);
    $value = str_replace("|)","d", $value);
    $value = str_replace("|\/|","m", $value);
    $value = str_replace("|\|","n", $value);
    
    
    $value = str_replace("|--_","e", $value);
    $value = str_replace("|--|","h", $value);
    $value = str_replace("|~~","f", $value);
    
    $value = str_replace("|-_","i", $value);
    $value = str_replace("|-~","j", $value);
    $value = str_replace("|__|","u", $value);
    
    $value = str_replace("|-","t", $value);
    
    $value = str_replace("|/\\","k", $value);
    $value = str_replace("|_","l", $value);
    
    
    $value = str_replace("|()","p", $value);
    $value = str_replace("()~","q", $value);
    $value = str_replace("()","o", $value);
    $value = str_replace("(~)","s", $value);
    $value = str_replace("(~","g", $value);
    $value = str_replace("(","c", $value);
   
     
    
    $value = str_replace("\/*\/","w", $value);
    $value = str_replace("/\\","x", $value);
    $value = str_replace("\//","y", $value);
    $value = str_replace("\/","v", $value);
    $value = str_replace("-/-","z", $value);
    
    
    
    
   
    
    
    //replace the numbers
    $value = str_replace("\/^\/","0", $value);
    $value = str_replace("\/@\/","1", $value);
    $value = str_replace("\/%\/","2", $value);
    $value = str_replace("\/!\/","3", $value);
    $value = str_replace("\/'\/","4", $value);
    $value = str_replace("\/\"\/","5", $value);
    $value = str_replace("\/&\/","6", $value);
    $value = str_replace("\/?\/","7", $value);
    $value = str_replace("\/X\/","8", $value);
    $value = str_replace("\/.\/","9", $value);
  
    
    echo "<br />";echo "<br />";echo "<br />";echo $value;echo "<br />";
    
    $path = '/var/www/krex/krexdecipher-uploads/';
    $filename = md5($_FILES["file"]["name"]).'-krexipher.txt';
    
    // storing the output into a file and then prompting the download of that file
    $out  = fopen('/var/www/krex/krexdecipher-uploads/'.md5($_FILES["file"]["name"]).'-krexdecipher.txt', 'w');
    fputs($out, $value);
    fclose($out);


?>
