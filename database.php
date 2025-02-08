<?php
   $conn = new mysqli("localhost","root","","admin");
    if(!$conn)
    {
        die("connection unsucessfull".$conn->connect_error);
    }
    
?>