<?php
session_start(); 

$_SESSION["kl1"]="1";

$page=htmlspecialchars($_GET[page]);

header ("Location: $page");

?>