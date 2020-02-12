<?php
require('inc/file.inc.php');

function parseEvents($eventsFileContents)   {

    //Store the events
    $eventsArr = array();

    //Split by \n
    $rows = explode("\n", $eventsFileContents);
    //go through each line
    for($line = 0; $line < count($rows); $line++){
       //Split by ','
       $cols = explode(",", $rows[$line]);
       try{
       //Build a 2d array of the file.
        if(sizeof($cols) != 3) {
            throw new Exception("There was an error processing file. Too many columns on line ".($line+1));
        }
    }
        catch(Exception $ex){
          echo $ex->getMessage();
        }

            for($c = 0; $c < count($cols); $c++){
         $eventsArr[$line][$c] = trim($cols[$c]);

}
    }
   return $eventsArr;

}

?>