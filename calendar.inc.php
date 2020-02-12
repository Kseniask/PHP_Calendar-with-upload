<?php

//This function will return a datastructure indicating the entrires for each day, the current day, the start of the month as well as end of the month in a single array.  This information will be passed to an html function
function getCalendarData()	{

    //Create a timestamp based on the parameters for getCalendarData
    $date = date('Y-m-d');
   $timeStamp = strtotime($date);
   
    //Empty Array
    $calendarData = array();
    //We have to set the counter to 1 and not zero because calendar days start at 1.
    $counter=1;
    $indexes =0;
    //Important Days, get the first day and the last day of the month
     $firstDay = date('Y-m-01',$timeStamp);
     $calendarData["firstDay"] = $firstDay;
     $firstWeekDayIndex= date("w",$firstDay);
     $numDays = date("t",$timeStamp);
     $lastDay = date('Y-m-'.$numDays, $timeStamp);
     $calendarData["lastDay"] = $lastDay;
        //Iterate through the grid (7 x 5)
        for($i=0; $i<5;$i++){
            for($j=0;$j<7;$j++){
                    if($j<=$firstWeekDayIndex+1){
                    $calendarData[$indexes] = null;
                    $indexes++;
                    }
                    else if($counter <= $numDays){
                        $calendarData[$indexes] = $counter;
                        $counter++;
                        $indexes++;
                    }
                        else{
                    $calendarData[$indexes] = null;
                    $indexes++;
                }
                
            }
            $firstWeekDayIndex=-2; 
        }
            //Go through each column
    
                    //Start counting the days if the $counter s greater than the first day, continue on until the counter is less than or equal to the last day + the first day (which would mean the number of days in the month has been reached.)
    
        //Append the current month and year to the array
        $currentMonth =date("F", $timeStamp );
        $currentYear = date("Y",  $timeStamp );
        $calendarData["month"] = $currentMonth;//Record the month
        $calendarData["year"] = $currentYear;//Record the year
        return $calendarData;
    }

?>