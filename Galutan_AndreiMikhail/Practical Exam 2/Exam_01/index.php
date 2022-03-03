<?php
//Exam_01
function check_plaindrome($str) { //function to check a string if it is a palindrom
    $strorig = $str; //stores the original string to still show the spaces
    $str = str_replace(' ', '', $str); //remove the spaces

    $str = strtolower($str); //changes the string to lowercase

    $reverse = strrev($str); //reverses the order of the string

    if ($str == $reverse) { //checks whether the string is indeed the when reversed
        echo $strorig ." is indeed a Palindrome<br><br>";
    } 
    else {
        echo $strorig." unfortunately not a Palindrome<br><br>";
    }
}

echo "Sample Output:<br>"; 
check_plaindrome("madam"); //call the function

//Test Case
echo "TEST CASE:<br>";
echo "With SPACES:<br>";
check_plaindrome("nurses run");
echo "With NUMBERS:<br>";
check_plaindrome("123123123");
check_plaindrome("10 01");
?>