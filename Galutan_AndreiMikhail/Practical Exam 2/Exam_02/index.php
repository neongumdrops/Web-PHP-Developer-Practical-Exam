<?php
//Exam_02
echo 'Check directory to see files generated';
$hello = fopen("hello_there.php", "w")or die("Unable to open file!"); //Creates a file with a given filename in the same directory as this file
$txt = //holds the value of the content to be added on the generated file
"<?php

//This is a comment

echo 'This is a test page!';
echo 'Exam number two!';

//This is a second comment
?>";
fwrite($hello, $txt); //writes the value of the variable within the generated file
fclose($hello); //closes an open file pointer

//Test case
$hello2 = fopen("hello_there_again.html", "w")or die("Unable to open file!"); 
$txt2 = 
"<?php

//This is a comment for a test case to see if we can create two files at the same time 

echo 'This is a test case!';
echo 'Exam number two test case!';

//This is a second comment for a test case to see if we can create two files with different file types
?>";
fwrite($hello2, $txt2);
fclose($hello2);

?>