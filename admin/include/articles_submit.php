<?php
switch ($action) 
{
	case 'add':
		//--Adauga un articol
		if ($_POST['title']!='') 
		$o_db->execute("insert into article(title,description,keywords,content,categoryid) values ('".$_POST['title']."','".$_POST['description']."','".$_POST['keywords']."','".$_POST['textarea']."','".$_POST['categoryid']."')");
		header('Location: index.php?page=articles');
	break;
	case 'update':
		//--Modifica un articol
		$o_db->execute("update article set categoryid='".$_POST['categoryid']."', title='".$_POST['title']."',description='".$_POST['description']."',keywords='".$_POST['keywords']."',content='".$_POST['content']."' where articleid='".$_POST['articleid']."'");
		header('Location: index.php?page=articles');
	break;
	case 'delete':
		//--Sterge un articol
		 $o_db->execute("delete from article where articleid='".$_GET['articleid']."'");
		header('Location: index.php?page=articles');
	break;
	case 'search':
		//--Returnare articole dintr-o categorie
		 $o_db->getAll("select * from article where categoryid='".$_GET['categoryid']."'");
		 header('Location: index.php?page=articles&search='.$_GET['categoryid'].'');
	break;
	case 'publish':
		//-- Publicare/nepublicare articlole
		$o_db->execute("update article set publish=".$_GET['value']." where articleid='".$_GET['articleid']."'");
		header('Location: index.php?page=articles');
	break;
	default:
		error();
	break;
}
?>