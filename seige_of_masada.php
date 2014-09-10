<?php

// In 74 BC, Romans quelled the revolt in the land of Judaea. The revolting Jews were suppressed. The last packet of Jewish revolt held out in the hill fortress of Messada. The Romans layed seige to it. In the face of defeat, rather than surrendering, the trapped Jews came up with a way to be delivered from torture & slavery at the hands of the Romans. Commiting suicide was a blasphemy in Judaism. So, the trapped Jews rounded up and came to a conclusion that, starting from the first man, he will kill the man immediate to him and pass the sword to the third man. This will continue until only one person is left, who has to to commit suicide, so that all others can go to heaven. This was implemented and when the Romans entered the fortress, they were amazed to see no one, and then they came to realize the fate of their enemies.

// This is the Seige of Mesada problem. Given N people, starting from the 'i'th man, if the Mesada solution is implemented, which person is the last man standing. If the starting person's position is not mentioned, we take the default position value as 1.


$sword = 1;
$strike = 2;
$man_with_the_sword = 1;
seige_of_masada(5);


function seige_of_masada($n=2, $start=1)
{
  for($i=1; $i<=$n; $i++)
  {
    $arr_men[] = $i;
  }
  //echo $GLOBALS['strike'];
  //print_r($arr_men);
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
  
  
  do
  {
    $arr_men = initiate_killing_round($arr_men);
    //echo 'kau';echo '<br>';
    //echo $GLOBALS['$man_with_the_sword']; echo '<br>';
    //echo count($arr_men);
    var_dump($arr_men);
  }while(count($arr_men)>2);
  
  //echo $GLOBALS['$man_with_the_sword']; echo '<br>';
  $last_man_standing = $GLOBALS['$man_with_the_sword'];
  
  print("the last man standing is $last_man_standing");
  
  /*
  $arr_men = initiate_killing_round($arr_men);
  //echo $GLOBALS['$man_with_the_sword'];
  echo count($arr_men);
  var_dump($arr_men);
  
  $arr_men = initiate_killing_round($arr_men);
  //echo $GLOBALS['$man_with_the_sword'];
  echo count($arr_men);
  var_dump($arr_men);
 
  $arr_men = initiate_killing_round($arr_men);
  //echo $GLOBALS['$man_with_the_sword'];
  echo count($arr_men);
  var_dump($arr_men);
  
  $arr_men = initiate_killing_round($arr_men);
  //echo $GLOBALS['$man_with_the_sword'];
  echo count($arr_men);
  var_dump($arr_men);*/
  
  
 
}

  function initiate_killing_round($arr_men)
  {
    $count = 0;
    $array_count = count($arr_men); 
    for($i=0; $i<=$array_count; $i+=$GLOBALS['strike'])
    {
      if($count>0 && $i < $array_count)
      {
        unset($arr_men[$i-1]);
        //echo $arr_men[$i];
        //echo $i;
        $GLOBALS['sword'] = $i;
        //var_dump($arr_men);
      }
      
      $count++;
    }
    //echo $GLOBALS['sword'];
    $temp = $GLOBALS['sword'];
    $GLOBALS['$man_with_the_sword'] = $arr_men[$temp];
    $key = array_search($GLOBALS['sword'],array_keys($arr_men));
    $output1 = array_slice($arr_men, $key); 
    $output2 = array_slice($arr_men, 0,$key); 
    $new=array_merge($output1,$output2);
    //print_r($new);
    //var_dump($new);
    return $new;
  }


?>
