<?php

// if language is NOT set as session
if (!isset($_SESSION['lang']))
{
	if ($_GET['l'] == "")
	{
		$_SESSION['lang'] = "no";
		header("Location: " . $_SERVER['PHP_SELF'] . "?l=" . $_SESSION['lang']);
		exit();
	}
	else
	{
		$_SESSION['lang'] = $_GET['l'];
	}
}
// if language is set as session
else{
	if ($_GET['l'] == ""){
		header("Location: " . $_SERVER['PHP_SELF'] . "?l=" . $_SESSION['lang']);
		exit();
	}
	else
	{
		$_SESSION['lang'] = $_GET['l'];
	}
}



?>