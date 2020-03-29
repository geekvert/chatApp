<?php
session_unset();
session_destroy();
setcookie("rchat", "", time()-3600);
header("Location: ../index.php");
?>