<?php
switch ($action) 
{
	case 'add':
		//--Adaugare grup
		if ($_POST['title']!='') {
		$o_db->execute("insert into `group`(title) values ('".$_POST['title']."')");
		$i_groupid=$o_db->insertId();
		if (isset($_POST['moduleid'])) {
			for ($i=0;$i<count($_POST['moduleid']);$i++)
			$o_db->execute("insert into group_module(groupid,moduleid) values ($i_groupid,'".$_POST['moduleid'][$i]."')");
			}
		}
		header('Location: index.php?page=groups');
	break;
	case 'update':
		//--Modificare grup
		if ($_POST['title']!='') 
		{
			$o_db->execute("update `group` SET title = '".$_POST['title']."' WHERE groupid = ".$_POST['groupid']);
			$o_db->execute("delete from `group_module` WHERE groupid = ".$_POST['groupid']);
			if (isset($_POST['moduleid'])) 
			{
			  for ($i=0;$i<count($_POST['moduleid']);$i++)
				$o_db->execute("insert into group_module(groupid,moduleid) values (".$_POST['groupid'].",'".$_POST['moduleid'][$i]."')");
			}
		}
		header('Location: index.php?page=groups');
	break;
	case 'delete':
		if ($_GET['groupid'] == 1) error();
		//--Stergere grup
		$o_db->execute("delete from `group` where groupid='".$_GET['groupid']."'");
		$o_db->execute("delete from group_module where groupid='".$_GET['groupid']."'");
		header('Location: index.php?page=groups');
	break;
	default:
		error();
	break;
}
?>