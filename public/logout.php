<?php
session_start();
session_unset();
session_destroy();

header("location: ../public/index.php");
exit();
?>