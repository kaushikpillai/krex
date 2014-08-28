<?php
$x=5; // global scope

function myTest() {
  $y=10; // local scope
//  global $x;
  echo "<p>Test variables inside the function:</p>";
  print ("Variable x is:" .$GLOBALS['x']);
  echo "<br>";
  echo "Variable y is: $y";
}

myTest();

echo "<p>Test variables outside the function:</p>";
echo "Variable x is: $x";
echo "<br>";
echo "Variable y is: $y";
?> 


<?php
/*$x=5;
$y=10;

function myTest() {
  $GLOBALS['y']=$GLOBALS['x']+$GLOBALS['y'];
}

myTest();
echo $y; // outputs 15*/
?> 
