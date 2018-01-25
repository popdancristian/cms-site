<?php
switch ($action) 
{
	case 'add':
		//--Adauga o pagina
		$i_publish = (isset($_POST['publish'])) ? 1 : 0;
		$i_nextorder = $o_db->getOne('select ordon from page where ordon = '.intval($_POST['ordon']));
		if (!empty($i_nextorder)) $o_db->execute("update page set ordon=ordon+1 where ordon>='".intval($_POST['ordon'])."'");
		if (trim($_POST['title'])!='') 
		$o_db->execute("insert into page(title, description, keywords, home, content,ordon,publish,userid) values ('".$_POST['title']."','".$_POST['description']."','".$_POST['keywords']."',0,'".$_POST['textarea']."','".intval($_POST['ordon'])."',$i_publish,'".$_SESSION['a_user']['userid']."')");
		header('Location: index.php?page=pages');
	break;
	case 'update':
		//--Modifica o pagina
		$i_publish = (isset($_POST['publish'])) ? 1 : 0;
		$i_nextorder = $o_db->getOne('select ordon from page where ordon = '.intval($_POST['ordon']).' and pageid !='.$_POST['pageid']);
		if (!empty($i_nextorder)) $o_db->execute("update page set ordon=ordon+1 where ordon>='".intval($_POST['ordon'])."'");
		
		$o_db->execute("update page set title='".$_POST['title']."',description='".$_POST['description']."',keywords='".$_POST['keywords']."',content='".$_POST['textarea']."',ordon='".intval($_POST['ordon'])."',publish=$i_publish,userid=".$_SESSION['a_user']['userid']." where pageid='".$_POST['pageid']."'");
		header('Location: index.php?page=pages');
	break;
	case 'delete':
		//--Sterge o pagina
		 $o_db->execute("delete from page where pageid='".$_GET['pageid']."'");
		header('Location: index.php?page=pages');
	break;
	case 'home':
		//--Setare pagina de home
		if ($_GET['value']==1) header('Location: index.php?page=pages');
		else 
		{
			$o_db->execute("update page set home=0 where home=1");
			$o_db->execute("update page set home=1 where pageid='".$_GET['pageid']."'");
			header('Location: index.php?page=pages');
		}
	break;
	case 'publish':
		$o_db->execute("update page set publish=".$_GET['value']." where pageid='".$_GET['pageid']."'");
		header('Location: index.php?page=pages');
	break;
	default:
		error();
	break;
}	
?>