<?php
session_start();
session_unset();
session_destroy();
header("LOCATION: index.php?logout=0");
?>