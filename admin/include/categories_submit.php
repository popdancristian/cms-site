<?php
switch ($action) 
{
	case 'add':
		//--Adauga o categorie
		$i_publish = (isset($_POST['publish'])) ? 1 : 0;
		$i_nextorder = $o_db->getOne('select ordon from category where ordon = '.intval($_POST['ordon']));
		if (!empty($i_nextorder)) $o_db->execute("update category set ordon=ordon+1 where ordon>='".intval($_POST['ordon'])."'");
		if (trim($_POST['title'])!='') 
		$o_db->execute("insert into category(title, description, keywords, content,ordon,publish,userid) values ('".$_POST['title']."','".$_POST['description']."','".$_POST['keywords']."','".$_POST['textarea']."','".intval($_POST['ordon'])."',$i_publish,'".$_SESSION['a_user']['userid']."')");
		header('Location: index.php?page=categories');
	break;
	case 'update':
		//--Modifica o categorie
		$i_publish = (isset($_POST['publish'])) ? 1 : 0;
		$i_nextorder = $o_db->getOne('select ordon from category where ordon = '.intval($_POST['ordon']).' and categoryid !='.$_POST['categoryid']);
		if (!empty($i_nextorder)) $o_db->execute("update category set ordon=ordon+1 where ordon>='".intval($_POST['ordon'])."'");
		$o_db->execute("update category set title='".$_POST['title']."',description='".$_POST['description']."',keywords='".$_POST['keywords']."',content='".$_POST['textarea']."',ordon='".intval($_POST['ordon'])."',publish=$i_publish,userid=".$_SESSION['a_user']['userid']." where categoryid='".$_POST['categoryid']."'");
		header('Location: index.php?page=categories');
	break;
	case 'delete':
		//--Sterge o categorie
		 $o_db->execute("delete from category where categoryid='".$_GET['categoryid']."'");
		header('Location: index.php?page=categories');
	break;
	case 'publish':
		//-- Publicare/nepublicare categorie
		$o_db->execute("update category set publish=".$_GET['value']." where categoryid='".$_GET['categoryid']."'");
		header('Location: index.php?page=categories');
	break;
	default:
		error();
	break;
}
?>