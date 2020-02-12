<?php

//This function will read in a file
function file_getContents($fileName)    {

    //Try to get a file handle
    try{
       $fileHandle = fopen($fileName,'r');
       if(!$fileHandle){
          throw new Exception("Could not open a file");
       } 
    
    //Try to read in the file
       $contents = fread($fileHandle,filesize($fileName));
       if(empty($contents)){
           throw new Exception("File is empty");
       }
    }
    //If there was a problem throw an Exception
    catch(Exception $ex){
        echo $ex->getMessage();
    }
    
    //Finally close the filehandle
fclose($fileHandle);

return $contents;
}

?>