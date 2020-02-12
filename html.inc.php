<?php

function html_header($title)  { ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
</head>
<body>
<h1> Lab03-Ksenia Skaletska-47</h1>
<?php }

function html_footer()  { ?>
<style>
	table{
		width: 100%;
		margin: 0 auto;
	}
	td{
		height: 70px;
		width:14.2%;
	}
	th{
		height: 40px;
	}
</style>
</body>
</html>
<?php }

function html_uploadForm()  { ?>
  <form method="POST" action ="" enctype="multipart/form-data">
  <p>Please choose your file</p>
  <input type="file" name = "filename">
  <br>
  <input type="submit" value = "upload">
  <br> </form>
<?php }

//This funciton will take the data array and display the calendar
function html_calendar($data, $events = array())	{
	
	//Array containing the days of the week.
	$daysOfWeek = ['Sunday', 'Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'];
	//Counter
	$counter = 0;	

	//Begin calendar by printing the headerO
	echo "<table border=1 id=\"month\"><th colspan=\"7\">".$data["month"]." ".$data["year"]."</tr>";
	//Print the month and year of the Calendar

	//Print out the days of the week.
	echo "<tr>";
	for($w = 0; $w<count($daysOfWeek);$w++){
		echo "<td>".$daysOfWeek[$w]."</td>";
	}
	echo "</tr>";
	//Iterate through the array and print out the boxes
	for ($x = 0; $x < 6; $x++)	{
		echo '<TR>';
		for ($y = 0; $y < 7; $y++)	{
			//Check to see if the counter is null
			if (is_null($data[$counter])) {
				echo '<TD BGCOLOR="#DDD">&nbsp;</TD>';
				$counter++;
				//If events data was passed in, process it...
			 }  
			 else {
				//Flag for an event
				$eventFlag = false;
				//placeholder for the current event
				$currentEvent = array();
				 //Go through the events array
				 for($i=0; $i<count($events); $i++){
				 //Check if the day mathces the current day we are on.
				 	if($data[$counter] == $events[$i][0]){
						 $currentEvent= $events[$i];
					     $eventFlag= true;
					 }
				}
				 //If ther was an event print it, if not just print the normal
				 	if ($eventFlag)	{
					echo "<td style=\"background:".$currentEvent[2]."\">".$data[$counter]." ".$currentEvent[1]."</td>";
					 } 
					 else {
					 //Otherwise just print the date.
					echo '<TD>'.$data[$counter].'</TD>';
				 }
				 $counter++;
				}
			
		}
		echo '</TR>';
	}

	echo '</TABLE>';
}

?>