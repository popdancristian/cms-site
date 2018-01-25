<?php
$a_group = $o_db->getAll('select * from `group`');
echo '<tr><td class="titlu">Gestionare grupuri</td></tr>';
echo '<tr><td><table border="0" width="100%" class="tabel" cellspacing="1" cellpadding="2"><th class="th">Nume</th><th class="th">Modificare</th><th class="th">Stergere</th>';
for ($i=0;$i<count($a_group);$i++) 
{
	echo '<tr>';
	echo '<td class="td" width="80%">'.$a_group[$i]['title'].'</td>';
    
    if ($a_group[$i]['groupid']!= 1)
    {
     echo '<td align="center" class="td"><a href="index.php?page=groups&action=mod&groupid='.$a_group[$i]['groupid'].'" title="Modificare"><img alt="Modificare" src="images/mod.gif" border="0"></a></td>';
	 echo '<td align="center" class="td"><a href="submit.php?page=groups&groupid='.$a_group[$i]['groupid'].'&action=delete" onclick="return confirm(\'Sunteti sigur ca doriti sa stergeti?\');" title="Stergere"><img alt="Stergere" src="images/del.gif" style="width:16px;height:16px;" border="0"></a></td></tr>';
    }
    else echo '<td class="td">&nbsp;</td><td class="td">&nbsp;</td></tr>';
	
}
echo '</table></td></tr>';
echo '<tr><td><input type="button" class="buttonad" value="Adauga Grup" onclick="location.href=\'index.php?page=groups&action=add\';" ></td></tr>';

echo '</form></tr></td>';
?>