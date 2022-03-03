<!DOCTYPE html>
<html>
<head></head>

<?php
     $con = mysqli_connect('localhost', 'root', '', 'software'); 
      if (mysqli_connect_errno()) { echo "Failed to connect to MySQL: " . mysqli_connect_error();  }
echo "PHP<br><br>";
echo "1. LOOP<br><br>";
//WHILE LOOP
echo "A. While Loop<br>";
$x = 0; //Variable to contain the incrementing value starting from 0
$esum=0; //Variable to contain the total value of the added numbers

//The while loop is set to less than or equal to ten so it can repeat the process from 0 up until it reaches 10.
while($x<=10) {
  if($x % 2 == 0){ //check whether the number is divisible by 2 with no remainders which makes it EVEN
        $esum=$esum+$x; //continuosly add the numbers that fullfill the condition
    }
    $x++; //increments the process by 1 up until the limit which is 10
}
echo $esum." - is the sum of all even numbers from 0 to 10. "; //print out the variable holding the final sum
echo "<br><br>";

//DO WHILE LOOP
echo "B. Do While Loop<br>";
$y = 0; //Variable to contain the incrementing value starting from 0
$osum=0; //Variable to contain the total value of the added numbers

do{ //the process that is to be committed 
    if($y % 2 != 0){ //check whether the number is NOT divisible by 2 with no remainders which makes it ODD
        $osum=$osum+$y; //continuosly add the numbers that fullfill the condition
    }
    $y++; //increments the process by 1 up until the limit which is 10  
}
while($y<=10);
echo $osum." - is the sum of all odd numbers from 0 to 10. "; //print out the variable holding the final sum
echo "<br><br>";

//FOR LOOP
echo "C. For Loop<br>";
$num1=0; //Variable to contain the starting values
$num2=1; //Variable to contain the second values
$num3=0; //Variable that holds the sum values carried over to num2
    echo " Fibonacci Sequence (from 0 to 10)";
    echo "<br>";

    for($i=0;$i<=9;$i++) //loop numbers, including 0 counting up to 9 which is 10 times in total
    {    
        $num3 = $num1;    //start with 0
        echo $num3." "; 
        $num3 = $num1 + $num2;    //continuosly adding numbers to the sum of the previous number 0+1=1 etc...     
        $num1=$num2;       
        $num2=$num3;     
    }  
echo "<br><br>";

//ARRAYS (DISPLAY NAME WITH MOST OCCURENCES)
echo "2. ARRAYS<br><br>";
echo "A. DISPLAY NAME WITH MOST OCCURENCES<br>";
$names = array("Marvin", "Marco", "Marvin", "Marco", "Marco",  "Marvin", "Christian");
$count = array_count_values($names);

arsort($count); //sort by descending order

$first = key($count); // get name of first element with the highest number
$count_first = current($count); // get occurrence for first array value

$count_second = next($count); // get occurrence for second array value
$second = key($count);

if($count_first != $count_second) { // confirm if names occurred in same frequencies
  echo $first . ' is the name that occurred most within the array';
}
else if($count_first == $count_second) {
  echo $first. " and ";
  echo $second . " are the names that occurred most within the array";
}
else {
  echo 'the array contained more than two values with highest occurrence.';
}
echo "<br><br>";

//ARRAYS (DISPLAY NUMBERS IN ASCENDING ORDER/ ROUNDING ODD NUMBERS TO NEAREST TENS)
echo "B. DISPLAY NUMBERS IN ASCENDING ORDER/ ROUNDING ODD NUMBERS TO NEAREST TENS<br>";
$nums = array(9863,7127,2020,80,131,55,100);
sort($nums);

foreach($nums as $odd){ 
  if ($odd %2 == 1){//identify odd numbers
    $oddtrue = ceil($odd/ 10) * 10; //round odd numbers to the nearest tens
    echo $oddtrue." ";
  }
  else{
    echo " ".$odd. " ";
  }
}
echo "<br><br>";


//ARRAYS (DISPLAY THE ITEM/S THAT ARE NOT REPETITIVE)
echo "C. DISPLAY THE ITEM/S THAT ARE NOT REPETITIVE<br>";
$colors = array("red","blue","black","red","blue","blue","red","gold");
$ccount = array_count_values($colors); //counts the occurrences of colors within the array
$colors2 = []; //holds the vakue that is unique

foreach($ccount as $col=>$rep) {    
   if($rep==1){ //verify non-repeating values
    $colors2=$col;
    print $colors2." ";
  }
}
echo "<br><br><br>";


//SQL Tables
echo "SQL<br>";
//Highest Paid Employee
echo "A. Highest Paid Employee";

//Filter the data to show the info of the employee with the highest salary including the id, name, department, salary amount
$sql = "SELECT employees.id,employees.name,employees.department_id,departments.department,salary.salary FROM employees, departments, salary WHERE employees.salary_id = 3 AND departments.department='IT' AND salary.salary = 20000";
      $myData = mysqli_query($con, $sql);

      echo "<table border=1>
        <tr>
          <th>id</th>
          <th>name</th>
          <th>department_id</th>
          <th>department</th>
          <th>salary</th>
        </tr>"; 

   //echo data to reflect in the table
      while($row = mysqli_fetch_assoc($myData)){
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['department_id'] . "</td>";
        echo "<td>" . $row['department'] . "</td>";
        echo "<td>" . $row['salary'] . "</td>";
        echo "</tr>";
      }
      echo "</table>";
echo "<br>";

//Employees hired from 2017-2018
echo "B. Employees hired from 2017-2018";

//Filter the data to show the employees with the date of hiring(date_hired) from 2018 onwards
$sql2 = "SELECT * FROM employees WHERE date_hired BETWEEN '2017-01-01' AND '2018-12-31'";
      $myData2 = mysqli_query($con, $sql2);

      echo "<table border=1>
        <tr>
          <th>id</th>
          <th>name</th>
          <th>date_hired</th>
          <th>department_id</th>
          <th>salary_id</th>
        </tr>"; 

      //echo data to reflect in the table
      while($row = mysqli_fetch_assoc($myData2)){
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['date_hired'] . "</td>";
        echo "<td>" . $row['department_id'] . "</td>";
        echo "<td>" . $row['salary_id'] . "</td>";
        echo "</tr>";
      }
      echo "</table>";
echo "<br>";

//Employees from IT Department hired 2018 onwards
echo "C. Employees from IT Department hired 2018 onwards";
$sql3 = "SELECT employees.id,employees.name,employees.date_hired,departments.department FROM employees, departments WHERE employees.department_id = 3 and departments.id = 3 AND employees.date_hired >= '2018_01-31'";
                        $myData3 = mysqli_query($con, $sql3);

                        echo "<table border=1>
                          <tr>
                            <th>id</th>
                            <th>name</th>
                            <th>date_hired</th>
                            <th>department</th>
                          </tr>"; 

                        //echo data to reflect in the table
                        while($row = mysqli_fetch_assoc($myData3)){
                          echo "<td>" . $row['id'] . "</td>";
                           echo "<td>" . $row['name'] . "</td>";
                          echo "<td>" . $row['date_hired'] . "</td>";
                          echo "<td>" . $row['department'] . "</td>";
                          echo "</tr>";
                        }
    echo "</table>";
  echo "<br><br>";
?>
<! –– JAVASCRIPT ––>
<body>
<h2>JAVASCRIPT</h2>
<h4>A. Capitalize The First Word Only and Add Spaces Per Word:</h4>
<h4>Previous:</h4>
<p>TheQuickBrownFoxJumpedOverTheLazyDog</p>
<h4>After:</h4>
<p id="text" ></p>

    <table class="table">
    <tr>
        <th>ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Birthday</th>
        <th>Gender</th>
        <th>Known Language</th>
    </tr>

<h4>B. Create a function that will parse and display the JSON:</h4>
    <tbody id="myTable">

</body>

<script>
//CAPITALIZE THE FIRST WORD ONLY AND ADD SPACES PER WORD
var txt = "TheQuickBrownFoxJumpedOverTheLazyDog";  
    txt=txt.replace("The","THE".toUpperCase()); //capitalize all the letters of the first word which is "The"
var txt2 = txt.replace(/([A-Z])/g, ' $1').trim() //add spaces in between each uppercase letter identified
var txt3 = txt2.replace(/T H E/g, "THE"); //remove the spaces from the capitalized word "THE" so the word is not separated
document.getElementById("text").innerHTML = txt3;

//PARSE AND DISPLAY JSON
var myArray = [
	    {
        'id':"1",
        'firstName':'John', 
        'lastName':'Doe', 
        'birthday':'1990-05-07',
        'gender':{
          'male':true,
          'female':false,
        },
        'knownLanguage':[
          "English",
          "Japanese",
          "Chinese"
        ],
      },

	    {
        'id':"2",
        'firstName':'Lina', 
        'lastName':'Art', 
        'birthday':'1994-08-05',
        'gender':{
          'male':false,
          'female':true,
        },
        'knownLanguage':[
          "English",
          "Japanese",
        ],
      },
	]
	
buildTable(myArray)

	function buildTable(data){
		var table = document.getElementById('myTable')
    
		for (var i = 0; i < data.length; i++){ //generate table based on the data from the JSON
			var row = 
      //get the values of specific data required
      //set the boolean values for the radio button as "checked" and make them uneditable
      //
            `<tr>
							<td>${data[i].id}</td> 
							<td>${data[i].firstName}</td>
							<td>${data[i].lastName}</td>
              <td>${data[i].birthday}</td>
              <td><input type="radio" name="rank" disabled ${data[i].gender.male ? 'checked' : ''}> Male 
                  <input type="radio" name="rank2"disabled ${data[i].gender.female ? 'checked' : ''}> Female 
              </td>
              <td>
                  <input type="checkbox" id="eng" disabled ${data[i].knownLanguage.includes('English') ? 'checked' : ''}>
                  <label for="lang1" > English</label> 
                  <input type="checkbox" id="jap" disabled ${data[i].knownLanguage.includes('Japanese') ? 'checked' : ''}>
                  <label for="lang2"> Japanese</label>
                  <input type="checkbox" id="cn" disabled ${data[i].knownLanguage.includes('Chinese') ? 'checked' : ''}>
                  <label for="lang3"> Chinese</label>
              </td>
					  </tr>`
       
			table.innerHTML += row


		}
	}
</script> 
</html>