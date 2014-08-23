<?php

  // http://www.weberforums.com/topic17161.html
  // function to remove style encodings and other formatted styles from the text
  function word_cleanup ($str)
  {
    $pattern = "/<(\w+)>(\s|&nbsp;)*<\/\1>/";
    $str = preg_replace($pattern, '', $str);
    return mb_convert_encoding($str, 'HTML-ENTITIES', 'UTF-8');
  }
  
?>
