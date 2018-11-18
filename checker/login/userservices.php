<?php 
session_start();
if(isset($_SESSION['vid']))
{
echo "Welcome, ".$_SESSION['vid'];
}
else
{
   echo "<script type='text/javascript'>alert('Please Login To Continue');window.location='login.html'</script>";
}
?>