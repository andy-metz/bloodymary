<?php
session_start();

if(isset($_POST))
	$_SESSION['aliment']=  "Fruit";//$_POST['aliment_selectionne'];

?>