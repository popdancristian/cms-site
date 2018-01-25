<?php
echo '<tr><td class="titlu">Gestionare pagini</td></tr>';
$a_page = $o_db->getAll('select p.*,u.username
						 from page p
						 left join user u on p.userid = u.userid
						 order by p.ordon');
echo '<tr><td><table border="0" width="100%" class="tabel" cellspacing="1" cellpadding="2"><th class="th">Titlu</th><th class="th">Utilizator</th><th class="th">Acasa</th><th class="th">Publicare</th>';
echo'<th class="th">Modificare</th><th class="th">Stergere</th><th class="th">Ordonare</th>';
for ($i=0;$i<count($a_page);$i++) 
{
	echo '<tr><td class="td" width="50%">'.$a_page[$i]['title'].'</td>';
	echo '<td class="td" width="100">'.$a_page[$i]['username'].'</td>';
	
	if ($a_page[$i]['home']=="1") echo '<td class="td" align="center"><a href="submit.php?page=pages&pageid='.$a_page[$i]['pageid'].'&action=home&value=1" title="Acasa"><img src="images/on.gif" style="width:16px;height:16px;" border="0" alt="Acasa"></td>';
	else  echo '<td class="td" align="center"><a href="submit.php?page=pages&pageid='.$a_page[$i]['pageid'].'&action=home&value=0" title="Acasa"><img src="images/off.gif" style="width:16px;height:16px;" border="0" alt="Acasa"></a></td>';
	
		if ($a_page[$i]['publish']=="1") echo '<td class="td" align="center"><a href="submit.php?page=pages&pageid='.$a_page[$i]['pageid'].'&action=publish&value=0" title="Publicare"><img src="images/on.gif" style="width:16px;height:16px;" border="0" alt="Publicare"></td>';
	else  echo '<td class="td" align="center"><a href="submit.php?page=pages&pageid='.$a_page[$i]['pageid'].'&action=publish&value=1" title="Publicare"><img src="images/off.gif" style="width:16px;height:16px;" border="0" alt="Publicare"></a></td>';
	
	echo '<td align="center" class="td"><a href="index.php?page=pages&action=mod&pageid='.$a_page[$i]['pageid'].'" title="Modificare"><img src="images/mod.gif" style="width:16px;height:16px;" border="0" alt="Modificare"></a></td>';
	echo '<td align="center" class="td"><a href="submit.php?page=pages&pageid='.$a_page[$i]['pageid'].'&action=delete" onclick="return confirm(\'Sunteti sigur ca doriti sa stergeti?\');" title="Stergere"><img src="images/del.gif" alt="Stergere" style="width:16px;height:16px;" border="0"></a></td>';
	echo '<td align="center" class="td">'.$a_page[$i]['ordon'].'</td></tr>';
}
echo '</table></td></tr>';
echo '<tr><td><input type="button" class="buttonad" value="Adauga Pagina" onclick="location.href=\'index.php?page=pages&action=add\';"></td></tr>';
 echo'<tr><td> <fieldset class="ifieldset">	';
echo'<legend class="ilegend">Legenda</legend>'; 
 echo '<table  border="0"  cellspacing="1" cellpadding="1">';
 echo '<tr><td width="20"><img src="images/on.gif" style="width:16px;height:16px;" border="0"></td> <td class="instruction">-> Setare ca publicate/pagina acasa </td> ';
 echo '<tr><td width="20"><img src="images/off.gif" style="width:16px;height:16px;" border="0"></td> <td class="instruction">-> Setare ca nepublicate/ nu este pagina acasa </td> ';
 echo '<tr><td width="20"><img alt="Modificare" src="images/mod.gif" style="width:16px;height:16px;" border="0"></td> <td class="instruction">-> Modifica pagina </td> ';
 echo '<tr><td width="20"><img alt="Stergere" src="images/del.gif" style="width:16px;height:16px;" border="0"></td> <td class="instruction">-> Sterge pagina </td> ';
 echo '</table>'; 
echo'</fieldset></td></tr>';
		
?>