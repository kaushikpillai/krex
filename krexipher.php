<?php 
  if ( $_SERVER['PHP_SELF'] == '/krexipher.php')
    {  
      include 'header.php';
      print('<br /><br /><br />');
    }
?>

<?php 

require 'krexipher-uploader.php';
include 'download-prompter.php';
//require 'removeMSWordTags.php';

//echo $theData;
  krexipher($theData);

  // function to remove style encodings and other formatted styles from the text
  function word_cleanup ($str)
  {
    $pattern = "/<(\w+)>(\s|&nbsp;)*<\/\1>/";
    $str = preg_replace($pattern, '', $str);
    return mb_convert_encoding($str, 'HTML-ENTITIES', 'UTF-8');
  }

  function krexipher($input)
  {
    /*//echo $input;
    $arr_input = str_split($input);
    //print_r($arr);echo "<br />";
    $arr_output = array();
    for($i=0; $i<count($arr_input); $i++)
    {
      $arr_output[$i] = encode_krexipher($arr_input[$i]);
    }*/
    
    //echo $input;echo "<br />";
    $value = strtolower($input);//convert all content to lowercase
    $value = trim($value);// trim whitespaces and trailing spaces
    //$value = strip_tags($value);
    
    //$value = strip_word_html($value);
    $value = word_cleanup($value);//remove any style formatting from MSWord
        
    // it will remove all <!--[if ...]>....<![endif]--> comments(Removes MSWord formatting)
    //preg_replace('/<!--\[if[^\]]*]>.*?<!\[endif\]-->/i', '', $value);
    
    // it will remove all <!--[if ...]>.... --> comments
    //preg_replace('/<!--\[if[^\]]*]>.*?-->/i', '', $value);
    
    //echo "<br />";echo $value;echo "<br />";
    
    //replace the letters according to the cipher
    $value = preg_replace("/\s/","$", $value); // replace space
    $value = preg_replace("/'/","<", $value);
    $value = preg_replace("/\"/",">", $value);
    
    //replace the alphabets
    $value = preg_replace("/a/","/-\\", $value);
    $value = preg_replace("/b/","|))", $value);
    $value = preg_replace("/c/","(", $value);
    $value = preg_replace("/d/","|)", $value);
    $value = preg_replace("/e/","|--_", $value);
    $value = preg_replace("/f/","|~~", $value);
    $value = preg_replace("/g/","(~", $value);
    $value = preg_replace("/h/","|--|", $value);
    $value = preg_replace("/i/","|-_", $value);
    $value = preg_replace("/j/","|-~", $value);
    $value = preg_replace("/k/","|/\\", $value);
    $value = preg_replace("/l/","|_", $value);
    $value = preg_replace("/m/","|\/|", $value);
    $value = preg_replace("/n/","|\|", $value);
    $value = preg_replace("/o/","()", $value);
    $value = preg_replace("/p/","|()", $value);
    $value = preg_replace("/q/","()~", $value);
    $value = preg_replace("/r/","|)\\", $value);
    $value = preg_replace("/s/","(~)", $value);
    $value = preg_replace("/t/","|-", $value);
    $value = preg_replace("/u/","|__|", $value);
    $value = preg_replace("/v/","\/", $value);
    $value = preg_replace("/w/","\/*\/", $value);
    $value = preg_replace("/x/","/*\\", $value);
    $value = preg_replace("/y/","\//", $value);
    $value = preg_replace("/z/","-/-", $value);
    
    //replace the numbers
    $value = preg_replace("/0/","|^\}", $value);
    $value = preg_replace("/1/","|@/{", $value);
    $value = preg_replace("/2/","|%\}", $value);
    $value = preg_replace("/3/","|!/{", $value);
    $value = preg_replace("/4/","|'\}", $value);
    $value = preg_replace("/5/","|\"/{", $value);
    $value = preg_replace("/6/","|&\}", $value);
    $value = preg_replace("/7/","|?/{", $value);
    $value = preg_replace("/8/","|X\}", $value);
    $value = preg_replace("/9/","|./{", $value);
    
    //echo "<br />";echo $value;echo "<br />";
    //echo "<br />";
    if ( !empty( $_FILES ) && strlen($value) > 0 )
    {
      print "<p class='texts'> Here is your encrypted message!!! </p>";
      print "<textarea class='output' readonly >$value</textarea>";
      echo "<br />";
    }
    
    
    
    
    $path = '/var/www/krex/krexipher-uploads/';
    $filename = md5($_FILES["file"]["name"]).'-krexipher.txt';
    
    
    /*
    //directly write the output thru php without storing the results into a file
    header('Content-Type: text');
    header('Content-Disposition: attachment;filename='.$_FILES["file"]["tmp_name"].'.txt');
    header('Cache-Control: max-age=0');
    
    $out = fopen('php://output', 'w');
    
    fputs($out, $value);
    fclose($out);
    */
    
    
    // storing the output into a file and then prompting the download of that file
    $out  = fopen('/var/www/krex/krexipher-uploads/'.md5($_FILES["file"]["name"]).'-krexipher.txt', 'w');
    fputs($out, $value);
    fclose($out);
    
    //promptToDownload($path, $filename, 'txt');
    
    //header("Content-disposition: attachment; filename= $filename");
    //header("Content-type: text");
    //readfile('/var/www/krex/krexipher-uploads/'.md5($_FILES["file"]["name"]).'-krexipher.txt');

  }
  
  
  function strip_word_html($text, $allowed_tags = '<b><i><sup><sub><em><strong><u><br>')
  {
    mb_regex_encoding('UTF-8');
    //replace MS special characters first
    $search = array('/&lsquo;/u', '/&rsquo;/u', '/&ldquo;/u', '/&rdquo;/u', '/&mdash;/u');
    $replace = array('\'', '\'', '"', '"', '-');
    $text = preg_replace($search, $replace, $text);
    //make sure _all_ html entities are converted to the plain ascii equivalents - it appears
    //in some MS headers, some html entities are encoded and some aren't
    $text = html_entity_decode($text, ENT_QUOTES, 'UTF-8');
    //try to strip out any C style comments first, since these, embedded in html comments, seem to
    //prevent strip_tags from removing html comments (MS Word introduced combination)
    if(mb_stripos($text, '/*') !== FALSE)
    {
      $text = mb_eregi_replace('#/\*.*?\*/#s', '', $text, 'm');
    }
    //introduce a space into any arithmetic expressions that could be caught by strip_tags so that they won't be
    //'<1' becomes '< 1'(note: somewhat application specific)
    $text = preg_replace(array('/<([0-9]+)/'), array('< $1'), $text);
    $text = strip_tags($text, $allowed_tags);
    //eliminate extraneous whitespace from start and end of line, or anywhere there are two or more spaces, convert it to one
    $text = preg_replace(array('/^\s\s+/', '/\s\s+$/', '/\s\s+/u'), array('', '', ' '), $text);
    //strip out inline css and simplify style tags
    $search = array('#<(strong|b)[^>]*>(.*?)</(strong|b)>#isu', '#<(em|i)[^>]*>(.*?)</(em|i)>#isu', '#<u[^>]*>(.*?)</u>#isu');
    $replace = array('<b>$2</b>', '<i>$2</i>', '<u>$1</u>');
    $text = preg_replace($search, $replace, $text);
    //on some of the ?newer MS Word exports, where you get conditionals of the form 'if gte mso 9', etc., it appears
    //that whatever is in one of the html comments prevents strip_tags from eradicating the html comment that contains
    //some MS Style Definitions - this last bit gets rid of any leftover comments */
    $num_matches = preg_match_all("/\<!--/u", $text, $matches);
    if($num_matches)
    {
      $text = preg_replace('/\<!--(.)*--\>/isu', '', $text);
    }
    return $text;
  }
  
  
  
?>
<?php 
  if ( $_SERVER['PHP_SELF'] == '/krexipher.php')
    {  
      include 'footer.php';
    }      
?>
      
