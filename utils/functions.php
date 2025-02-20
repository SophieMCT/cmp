<?php
//Function : clean our data 
//Param : string
//Return : string
function sanitize($data){
    return htmlentities(strip_tags(stripslashes(trim($data))));
}
?>