<?php

// In 74 BC, Romans quelled the revolt in the land of Judaea. The revolting Jews were suppressed. The last packet of Jewish revolt held out in the hill fortress of Messada. The Romans layed seige to it. In the face of defeat, rather than surrendering, the trapped Jews came up with a way to be delivered from torture & slavery at the hands of the Romans. Commiting suicide was a blasphemy in Judaism. So, the trapped Jews rounded up and came to a conclusion that, starting from the first man, he will kill the man immediate to him and pass the sword to the third man. This will continue until only one person is left, who has to to commit suicide, so that all others can go to heaven. This was implemented and when the Romans entered the fortress, they were amazed to see no one, and then they came to realize the fate of their enemies.

// This is the Seige of Mesada problem. Given N people, starting from the 'i'th man, if the Mesada solution is implemented, which person is the last man standing. If the starting person's position is not mentioned, we take the default position value as 1.

  // global variables
  $sword = 1;// the index of the person with the sword
  $man_with_the_sword = 1;// position of the man currently with the sword
  
  //Input Variables
  $strike = 3;// the difference in position between the men passing the swords (or) is -1 of the no of persons to be kiiled by each person in a single strike
  
  //  calling the main function.
  //  first parameter is the num of men
  //  and second parameter is the starting position of the man who is going to start the killing
  seige_of_masada(10,8);


  function seige_of_masada($n=2, $start=1)
  {
    // create an array, where position of the men are the values in the array.
    for($i=1; $i<=$n; $i++)
    {
      $arr_men[] = $i;
    }
    var_dump($arr_men);
    
    /*$arr=array('Monday' => 'mon',
    'Tuesday' => 'tue',
    'Wednesday' => 'wed',
    'Thursday' => 'thur',
    'Friday' => 'fri',
    'Saturday' => 'sat',
    'Sunday' => 'sun');
    //say your start is wednesday
    $key = array_search("Wednesday",array_keys($arr));
    $output1 = array_slice($arr, $key); 
    $output2 = array_slice($arr, 0,$key); 
    $new=array_merge($output1,$output2);
    print_r($new);*/
    
    // rearranging the array so that the man starting with the sword is in the starting position
    if($start > 1)
    {
      $key = array_search($start-1,array_keys($arr_men));
      $output1 = array_slice($arr_men, $key); 
      $output2 = array_slice($arr_men, 0,$key); 
      $arr_men = array_merge($output1,$output2);
      //var_dump($arr_men);
    }
    
    
    if($n==2 || $n==1)
    {
      print("the last man standing is $arr_men[0]");
    }
    else
    {
      do
        {
          $arr_men = initiate_killing_round($arr_men);
          //var_dump($arr_men);
        } while(count($arr_men)>$GLOBALS['strike']);
        
        $last_man_standing = $GLOBALS['$man_with_the_sword'];
        print("the last man standing is $last_man_standing");
    } 
  }

  //
  // function that does the killing of the men till the end of line is reached and there in no next man to kill
  //
  function initiate_killing_round($arr_men)
  {
    $count = 0;
    $array_count = count($arr_men); 
    for($i=0; $i<=$array_count; $i+=$GLOBALS['strike'])
    {
      if($count>0 && $i < $array_count)
      {
        for($j=1; $j<$GLOBALS['strike']; $j++)
        {
          unset($arr_men[$i-$j]);
        }
        $GLOBALS['sword'] = $i;
        var_dump($arr_men);
      }
      
      $count++;
    }
    $temp = $GLOBALS['sword'];
    $GLOBALS['$man_with_the_sword'] = $arr_men[$temp];
    $key = array_search($GLOBALS['sword'],array_keys($arr_men));
    $output1 = array_slice($arr_men, $key); 
    $output2 = array_slice($arr_men, 0,$key); 
    $new = array_merge($output1,$output2);
    //var_dump($new);
    return $new;
  }


?>
