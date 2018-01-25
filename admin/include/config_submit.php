<?php
switch ($action) 
{
	case 'title':
		//--Modifica titlu, motto, descriere, chei
		if ($_POST['title']!='') $o_db->execute("update config set configvalue='".$_POST['title']."' where configkey='title'");
		if ($_POST['motto']!='') $o_db->execute("update config set configvalue='".$_POST['motto']."' where configkey='motto'");
		if ($_POST['description']!='') $o_db->execute("update config set configvalue='".$_POST['description']."' where configkey='description'");
		if ($_POST['keywords']!='') $o_db->execute("update config set configvalue='".$_POST['keywords']."' where configkey='keywords'");
		header('Location: index.php?page=config');
	break;
	default:
		error();
	break;
}
?>