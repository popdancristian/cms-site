<?php
session_start(); //-- Start sesiune
if (empty($_SESSION['a_user'])) header('Location: login.php');
include_once '../init.php';//-- Include init
include_once 'include/functions.php';//-- Include functions

$page = isset($_GET['page']) ? $_GET['page'] : '';
$action = isset($_GET['action']) ? $_GET['action'] : '';

if (!empty($_SESSION['a_user']['module']))
$a_module=$o_db->GetAssoc("select * from module where moduleid in (".implode(",",array_keys($_SESSION['a_user']['module'])).") order by ordon",'page');
else
$a_module = array();

if ((!empty($page)) and (!isset($a_module[$page]))) header('Location: index.php');//-- Verifica drepturi pe modul
?>
<!--Pagina principala--> 
<html>
 <head>
  <title><?php if (!empty($page)) echo $a_module[$page]['title']; else echo 'Panou de control';?> - SGCweb</title>
  <meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
  <script type="text/javascript" language="JavaScript" src="include/functions.js"></script>
  <link rel="stylesheet" type="text/css" href="style.css">
 </head>
<body>
	<table  border="0"  cellspacing="0" cellpadding="0" width="980">
	<tr>
	 <td style="background-color:#8CC7E7" colspan="2">
	 <table  border="0"  cellspacing="0" cellpadding="0" width="100%">
	   <tr>
	    <td><a href="index.php" ><img src="images/logo.gif" width="200" height="50" border="0" alt="Administrare - SGCweb"/></a>
	    <td align="right" valign="top"><?php echo gmdate('Y-m-d');?>&nbsp;|&nbsp;<?php echo 'Bine ai venit '.$_SESSION['a_user']['firstname'].' '.$_SESSION['a_user']['lastname'].' ! '?>&nbsp;|&nbsp;<?php echo $_SESSION['a_user']['usergroup']; ?>&nbsp;<br/><a href="index.php" class="meniu">Acasa</a>&nbsp;|&nbsp;<a href="submit.php?page=logout" class="meniu">Iesire</a>&nbsp;</td>
	   </tr>
	 </table>
	 </td>
	</tr>
	<tr>
	<td valign="top" width="150" nowrap>
	<ul id="meniu_principal">
<?php 
// Include pentru fiecare user modulele corespunzatoare
foreach ($a_module as $str_key=>$a_value)
  echo '<li><a href="index.php?page='.$str_key.'">'.$a_value['title'].'</a></li>';
?>		
	</ul>
	<fieldset class="fieldset">	
	 <legend class="legend">Info</legend>
	 <?php
	  if (!empty($a_module[$page]['description'])) echo $a_module[$page]['description'];
	  else echo 'SGCWeb version 1.0';
	 ?>
    </fieldset>
    <div class="copyright">&copy; Copyright 2010 SGCweb</div>
   </td>
   <td width="830" valign="top" nowrap style="border-left:1px solid #FFFFFF;border-top:1px solid #FFFFFF;">
     <table  border="0"  cellspacing="0" cellpadding="2" width="100%" style="border:1px solid #DEDFDE;">
		<?php 
		 //-- Include in meniu fisierele specificate
		 if ((!empty($page)) and (file_exists('include/'.$page.'.php'))) 
		 {
		  if ((!empty($action)) and (file_exists('include/'.$page.'_'.$action.'.php')))
		    include_once 'include/'.$page.'_'.$action.'.php';
		  else
			include_once 'include/'.$page.'.php';
		 }
		 else
		  include_once 'include/default.php';
		?>
		
    	
	</td>
   </tr>
   </table>
</body>


</html>
