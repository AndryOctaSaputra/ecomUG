<?php
	@mysql_connect("localhost","root","") or die("Demo is not available, please try again later");
	@mysql_select_db("db_shopping") or die("Demo is not available, please try again later");
	session_start();
?>