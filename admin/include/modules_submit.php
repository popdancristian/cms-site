<?php
switch ($action) 
{
	case 'active':
		//-- Publicare/nepublicare categorie
		$o_db->execute("update module set active=".$_GET['value']." where moduleid='".$_GET['moduleid']."'");

		//-- ReCitire drepturi user
		$a_result = $o_db->GetAll("select page,g.moduleid from module m inner join group_module g on m.moduleid=g.moduleid where g.groupid=".$_SESSION['a_user']['groupid']." and m.active = 1");
		$a_module=array();
		for ($i=0;$i<count($a_result);$i++) $a_module[$a_result[$i]['moduleid']]=$a_result[$i]['page'];
		$_SESSION['a_user']['module']=$a_module;

		header('Location: index.php?page=modules');
	break;
	default:
		error();
	break;
}
?>