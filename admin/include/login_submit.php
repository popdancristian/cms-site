<?php
//--Intrare user
$name=$_POST['username'];
$password=$_POST['password'];
//--Verifica user si parola
$a_user=$o_db->GetRow("select u.*,g.title as usergroup from user u
						left join `group` g on u.groupid=g.groupid where username='".$name."' and password='".$password."'");
if (empty($a_user)) 
{
	$_SESSION['error']="Utilizator si/sau parola incorecte";
	header('Location: login.php'); 
}
else 
{
		$_SESSION['a_user']=$a_user;
		//-- Citire drepturi user
		$a_result = $o_db->GetAll("select page,g.moduleid from module m inner join group_module g on m.moduleid=g.moduleid where g.groupid=".$a_user['groupid']." and m.active = 1");
		$a_module=array();
		for ($i=0;$i<count($a_result);$i++) $a_module[$a_result[$i]['moduleid']]=$a_result[$i]['page'];
		$_SESSION['a_user']['module']=$a_module;
		header('Location: index.php');
		
}
?>