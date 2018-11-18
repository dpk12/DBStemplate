<?php
session_start();

if(session_destroy())
{
header("Location:../homepage.html");
}
//header("location:../homepage.html");
//session_destroy();
?>
