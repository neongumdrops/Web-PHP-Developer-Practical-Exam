<?php
//Exam_04
$date1 = new DateTime("2019-05-31");//variables containing dates
$date2 = new DateTime("2018-04-05");
$date3 = new DateTime("2022-3-04");
$date4 = new DateTime("2000-11-11");
$interval = $date1->diff($date2);//get the differnce between two dates
$interval2 = $date3->diff($date4);

echo "Sample Input:<br>";
echo "Date 1: ".date_format($date1,"Y/m/d")."<br>";
echo "Date 2: ".date_format($date2,"Y/m/d")."<br><br>";
echo "Output: <br> " .$interval->y. " year/s, " .$interval->m. " month/s, " .$interval->d. " day/s <br><br>"; //display date difference in Y/M/D format

//Test Case
echo "TEST CASE:<br>";
echo "Sample Input with total amount in DAYS ONLY:<br>";
echo "Date 3: ".date_format($date3,"Y/m/d")."<br>";
echo "Date 4: ".date_format($date4,"Y/m/d")."<br><br>";
echo "The difference between these two dates is " .$interval2->days. " day/s ";//Total amount in days only
?>