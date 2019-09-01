<?php
include "calls.php";
$user = new User();
if (isset($_POST['temperature']) && isset($_POST['macID'])) {
	$check = $user->check($_POST['macID']);
	if ($check == 0) {
			$user->insert($_POST['macID'], $_POST['temperature']);
		}else{
			$user->update($_POST['macID'], $_POST['temperature']);
		}
		echo 'Received';	
}else{
	echo 'Not Received';
}
?>