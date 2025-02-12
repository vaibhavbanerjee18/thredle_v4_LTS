<?php
session_start();
if(isset($_SESSION['email']))
{
    session_unset();
    session_destroy();
    header ('location: ../index.php?message=logout');
}
else{
    header ('location: ../index.php?info=No user found');
}

?>