<?php
switch ($action) 
{
	case 'add':
		//--Adaugare links
		if ($_POST['title']!='') 
		{
			$o_db->execute("insert into link (title,url) values ('".$_POST['title']."','".$_POST['url']."')");    
		}
		header('Location: index.php?page=links');
	break;
	case 'update':
		//--Modificare link
		if ($_POST['title']!='') 
		{
			$o_db->execute("update link SET title = '".$_POST['title']."',url = '".$_POST['url']."' WHERE linkid = ".$_POST['linkid']);                
		}
		header('Location: index.php?page=links');
	break;
	case 'delete':
		//--Stergere link
		$o_db->execute("delete from link where linkid='".$_GET['linkid']."'");
		header('Location: index.php?page=links');
	break;
	default:
		error();
	break;
}
?>