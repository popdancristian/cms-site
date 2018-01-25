<?php
session_start(); //-- Start sesiune
include_once '../init.php';//-- Include init
include_once 'include/functions.php';//-- Include functions

//-- Pagina si actiunea receptionata prin Post/Get
if (isset($_POST['page'])) $page = $_POST['page'];
elseif (isset($_GET['page'])) $page = $_GET['page'];
else $page = '';

if (isset($_POST['action'])) $action = $_POST['action'];
elseif (isset($_GET['action'])) $action = $_GET['action'];
else $action = '';

//-- Include fisierul de actiuni specific pentru fiecare modul
if ((!empty($page)) and (file_exists('include/'.$page.'_submit.php'))) 
	include_once 'include/'.$page.'_submit.php';
else
	 error();
?>