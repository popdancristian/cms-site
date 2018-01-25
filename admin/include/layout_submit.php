<?php
switch ($action) 
{
	case 'publish':
		$o_db->execute("update layout set active=0");
		$o_db->execute("update layout set active=1 where layoutid='".$_GET['layoutid']."'");
		header('Location: index.php?page=layout');
	break;
	default:
		error();
	break;
}	
?>