
<?php
function factorial($n) {
  if ($n < 0) {
    return "Factorial is not defined for negative numbers.";
  } elseif ($n == 0) {
    return 1;
  } else {
    return $n * factorial($n - 1);
  }
}

$number = 5; 
$result = factorial($number);
echo "The factorial of $number is $result";
?>
