<?php

if (isset($_POST['file'])) {
	$file = "../".trim(trim($_POST['file']));

	echo file_get_contents($file);
}

if (isset($_POST['text'], $_POST['fname'])) {
	$text = $_POST['text'];
	$fname = $_POST['fname'];

	$file = "../".trim(trim($_POST['fname']));

	file_put_contents($file, $text);

	echo "<i class='fa fa-check text-success'></i> Success";
}

?>