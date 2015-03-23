<?php
session_start();
session_destroy();
echo $_SESSION['USER'];
//exit;
header('Location:index.php');
?>