<?php
   $conn = new mysqli("brady.ns.cloudflare.com","root","","admin");
    if(!$conn)
    {
        die("connection unsucessfull".$conn->connect_error);
    }
    
?>