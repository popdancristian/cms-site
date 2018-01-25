<?php
switch ($action) 
{
	case 'add':
		//--Adauga user
		if ($_POST['username']!='')
		$o_db->execute("insert into user (username,firstname,lastname,password,email,groupid) values ('".$_POST['username']."','".$_POST['firstname']."','".$_POST['lastname']."','".$_POST['password']."','".$_POST['email']."','".$_POST['groupid']."')");
		header('Location: index.php?page=users');
	break;
	case 'update':
		//--Modificare user
		if ($_POST['username']!='') 
		{
			$o_db->execute("update user SET username = '".$_POST['username']."',firstname = '".$_POST['firstname']."',lastname = '".$_POST['lastname']."',password = '".$_POST['password']."',email = '".$_POST['email']."',groupid = '".$_POST['groupid']."' WHERE userid = ".$_POST['userid']);
		}
		header('Location: index.php?page=users');
	break;
	case 'delete':
		if ($_GET['userid']==$_SESSION['a_user']['userid']) error();
		//--Stergere user
		$o_db->execute("delete from user where userid='".$_GET['userid']."'");
		header('Location: index.php?page=users');
	break;
	default:
		error();
	break;
}
?>