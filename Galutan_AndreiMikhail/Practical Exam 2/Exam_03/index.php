<?php

function isPerfectSquare($x) // returns value if it is a perfect square
{
    $s = (int)(sqrt($x));
    return ($s * $s == $x);
}
 
function isFibonacci($n)
{
    return isPerfectSquare(5 * $n * $n + 4) ||//return value if and only if one or both of 5*n*n + 4 or 5*n*n - 4 is a perfect square
           isPerfectSquare(5 * $n * $n - 4);
}
 
echo "Checking numbers from 1 to 10 <br>"; //echoes both Fibonacci and non-Fibonacci numbers
for ($i = 1; $i <= 10; $i++){
    if(isFibonacci($i)){
    echo "$i is a Fibonacci Number <br>";
    }
    else{
    echo "$i is a not Fibonacci Number <br>" ;
    }
}

//Test case
echo "<br>TEST CASE:<br>";
echo "Checking numbers from 11 to 50 <br>";
for ($i = 11; $i <= 50; $i++){
    if(isFibonacci($i)){
    echo "$i is a Fibonacci Number <br>";
    }
    else{
    echo "$i is a not Fibonacci Number <br>" ;
    }
}

?>