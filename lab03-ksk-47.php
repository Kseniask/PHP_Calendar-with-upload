<?php

//Require files
require('inc/calendar.inc.php');
require('inc/events.inc.php');
require('inc/html.inc.php');
//HTml header with title
html_header("Lab03 - Sam Hill - 89");

//Check if a file was submitted
if (isset($_FILES) && !empty($_FILES))    {
    //If the file was submitted get the contents
    $content= file_getContents($_FILES['filename']['tmp_name']);
    //Then parse the files
    $events= parseEvents($content);
}

//Grab the calender data
$calendarData = getCalendarData();

//If there were events
if (isset($events)) {
    //Render the calender with the data
    html_calendar($calendarData,$events);
} else {
    //Otherwise just render the calendar
    html_calendar($calendarData); 
}


//Render the upload form
html_uploadForm();
//And finally the footer
html_footer();

?>