<?php
require('./php/connection.php');
function sanitize($data) {
	$data = trim($data);
	//$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
echo sha1("rahulrchat");
?>