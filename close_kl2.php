<?php
session_start(); 

$_SESSION["kl2"]="1";

$page=htmlspecialchars($_GET[page]);

header ("Location: $page");

?>