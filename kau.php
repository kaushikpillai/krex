<?php
  
  main();
  
  // main function to call all the other functions available
  function main()
  {
    //palindrome("malayalam");
    //isPrime(99);
    //eratosthenes_sieve($sieve, $n);
    //fibonacci(10);
    //isArmstrong(153);
    //keysearch("kau", "Kaushik loves Dhanya!!");
  }
  
  // to check whether a given number is prime or not
  function isPrime($n)
  {
	  $i = 2;
   
	  if ($n == 2) 
	  {
		  return true;	
	  }
   
	  $sqrtN = sqrt($n);
	  echo $sqrtN;
	  while ($i <= $sqrtN) 
	  {
		  if ($n % $i == 0) 
		  {
		    print("not prime");echo "<br />";
			  return false;
		  }
		  $i++;
	  }
   
    print("is prime");echo "<br />";
	  return true;
  }

  // function to generate prime numbers till the range on 'n' using eratosthenes sieve method
  function eratosthenes_sieve(&$sieve, $n)
  {
	  $i = 2;
   
	  while ($i <= $n) {
		  if ($sieve[$i] == 0) {
			  echo $i."<br />";
   
			  $j = $i;
			  while ($j <= $n) {
				  $sieve[$j] = 1;
				  $j += $i;
			  }
		  }
		  $i++;
	  }
  }
   
  $n = 100;
  $sieve = array_fill(0, $n, 0);
   
  // 2, 3, 5, 7, ..., 97
  /*eratosthenes_sieve($sieve, $n);*///calling the eratosthenes function
  
  // function to check whether a given word is a palindrome
  function palindrome($input)
  {
    //print($input);
    $arr = str_split(trim($input));
    //print_r($arr);echo "<br />";
    
    $flag = FALSE;
    $i=0;
    $j=count($arr) -1;
    
    while($i<count($arr))
    {
      while($j>=0)
      {
        //echo $i."-".$j; echo "<br />";
        if($arr[$i] == $arr[$j])
        {
          $flag = TRUE;
        }
        else
        {
          $flag = FALSE;
          break 2;
        }
        $j--;
        $i++;
      }
    }
    
    if($flag)
    {
      print ("\"".$input."\""." is a Palindrome!!");echo "<br />";
    }
    else
    {
      print ($input." is not a Palindrome!!");echo "<br />";
    }
  }
  
  
  //function to genetrate 'n' number of fibonacci numbers 
  function fibonacci($n)
  {
    echo "0"; echo "<br />";
    echo "1"; echo "<br />";
    
    $a = 0;
    $b = 1;
    for($i=0; $i<$n-2; $i++)
    {
      $sum = $a + $b;
      echo $sum; echo "<br />";
      $a = $b;
      $b = $sum;
    }

  }
  
  //function to check whether a number is an Armstrong number
  //i.e, the sum of the cubes of each digits should equla to the original number
  // ex: 153 , pow(1,3) + pow(5,3) + pow(3,3) = 1+ 125 + 27 = 153!! so its is an Armstrong number
  function isArmstrong($input)
  {
    $arr = str_split($input);
    //print_r($arr);
    $sum = 0;
    for($i=0; $i<count($arr); $i++)
    {
      $sum = $sum + pow($arr[$i], 3);
    }
    //print($sum);
    if($input == $sum)
    {
       print ("\"".$input."\""." is an Armstrong number!!");echo "<br />";
    }
    else
    {
      print ("\"".$input."\""." is not an Armstrong number!!");echo "<br />";
    }

  }
  
  // function to search for an keyword in a text.
  function keysearch($key, $text)
  {
    $text = preg_replace('/[^a-z\s]/', '', strtolower($text));
    print($text);echo "<br />";

    $text_array = preg_split('/\s+/', $text, NULL, PREG_SPLIT_NO_EMPTY);
    print_r($text_array);echo "<br />";

    $text_array = array_flip($text_array);
    print_r($text_array);echo "<br />";
    
    $key = strtolower($key);
    
    if (isset($text_array[$key]))
    {
      print ("\"".$key."\""." is present!!");echo "<br />";
    }
    else
    {
      print ("\"".$key."\""." is not present!!");echo "<br />";
    }
    
    /*if(preg_match('/\kau\b/', $input)) {
    echo $text.' has the word you';
    }*/
    
    // to even search for substring
    $pos = strpos($text, $key);
    if ($pos === false) 
    {
        print "Not found\n";
    } 
    else 
    {
        print "Found!\n";
        print $pos+1;
    }
    
  }
  

?>
