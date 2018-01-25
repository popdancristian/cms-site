<?php
$a_manage_user = $o_db->getAll('select u.*,g.title as usergroup from user u left join `group` g on g.groupid = u.groupid');

echo '<tr><td class="titlu">Gestionare utilizatori</td></tr>';
echo '<tr><td><table border="0" width="100%" class="tabel" cellspacing="1" cellpadding="2">';
echo '<th class="th">Utlizator</th><th class="th">Grup</th><th class="th">Nume</th><th class="th">Prenume</th><th class="th">Email</th><th class="th">Modificare</th><th class="th">Stergere</th>';
for ($i=0;$i<count($a_manage_user);$i++) 
{
	echo '<tr>';
	echo '<td class="td" width="30%">'.$a_manage_user[$i]['username'].'</td>';
    echo '<td class="td">'.$a_manage_user[$i]['usergroup'].'</td>';
    echo '<td class="td">'.$a_manage_user[$i]['firstname'].'</td>';
    echo '<td class="td">'.$a_manage_user[$i]['lastname'].'</td>';
    echo '<td class="td">'.$a_manage_user[$i]['email'].'</td>';
    
    if ($a_manage_user[$i]['userid']!=$_SESSION['a_user']['userid'])
    {
        echo '<td align="center" class="td"><a href="index.php?page=users&action=mod&userid='.$a_manage_user[$i]['userid'].'" title="Modificare"><img alt="Modificare" src="images/mod.gif" border="0"></a></td>';
        echo '<td align="center" class="td"><a href="submit.php?page=users&userid='.$a_manage_user[$i]['userid'].'&action=delete" onclick="return confirm(\'Sunteti sigur ca doriti sa stergeti?\');" title="Stergere"><img alt="Stergere" src="images/del.gif" style="width:16px;height:16px;" border="0"></a></td></tr>';
    }
    else echo '<td class="td">&nbsp;</td><td class="td">&nbsp;</td></tr>';
}
echo '</table></td></tr>';
echo '<tr><td><input type="button" class="buttonad" value="Adauga Utilizator" onclick="location.href=\'index.php?page=users&action=add\';" ></td></tr>';

echo '</form></tr></td>';
?>