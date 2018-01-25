<?php
$a_category = $o_db->getAll('select c.*,u.username
						 from category c
						 left join user u on c.userid = u.userid
						 order by c.ordon');
echo '<tr><td class="titlu">Gestionare categorii</td></tr>';
echo '<tr><td><table border="0" width="100%" class="tabel" cellspacing="1" cellpadding="2"><th class="th">Titlu</th><th class="th">Utilizator</th><th class="th">Publicare</th><th class="th">Modificare</th><th class="th">Stergere</th><th class="th">Articole</th><th class="th">Ordonare</th>';
for ($i=0;$i<count($a_category);$i++) 
{
	echo '<tr><td class="td" width="30%">'.$a_category[$i]['title'].'</td>';
	echo '<td class="td" width="100">'.$a_category[$i]['username'].'</td>';
	if ($a_category[$i]['publish']=="1") echo '<td class="td" align="center"><a href="submit.php?page=categories&categoryid='.$a_category[$i]['categoryid'].'&action=publish&value=0"><img src="images/on.gif" style="width:16px;height:16px;" border="0"></td>';
	else  echo '<td class="td" align="center"><a href="submit.php?page=categories&categoryid='.$a_category[$i]['categoryid'].'&action=publish&value=1"><img src="images/off.gif" style="width:16px;height:16px;" border="0"></a></td>';
	echo '<td align="center" class="td"><a href="index.php?page=categories&action=mod&categoryid='.$a_category[$i]['categoryid'].'" title="Modificare"><img alt="Modificare" src="images/mod.gif" border="0"></a></td>';
	echo '<td align="center" class="td"><a href="submit.php?page=categories&categoryid='.$a_category[$i]['categoryid'].'&action=delete" onclick="return confirm(\'Sunteti sigur ca doriti sa stergeti?\');" title="Stergere"><img alt="Stergere" src="images/del.gif" style="width:16px;height:16px;" border="0"></a></td>';
	echo '<td align="center" class="td"><a href="submit.php?page=articles&categoryid='.$a_category[$i]['categoryid'].'&action=search"><img src="images/preview.gif" border="0" > &nbsp Vizualizare articole </a></td>';
	echo '<td align="center" class="td">'.$a_category[$i]['ordon'].'</td></tr>';
}
echo '</table></td></tr>';
echo '<tr><td><input type="button" class="buttonad" value="Adauga Categorie" onclick="location.href=\'index.php?page=categories&action=add\';" ></td></tr>';
echo'<tr><td> <fieldset class="ifieldset">	';
echo'<legend class="ilegend">Legenda</legend>'; 
 echo '<table  border="0"  cellspacing="1" cellpadding="1">';
 echo '<tr><td width="20"><img src="images/on.gif" style="width:16px;height:16px;" border="0"></td> <td class="instruction">-> Setare ca publicate </td> ';
  echo '<tr><td width="20"><img src="images/off.gif" style="width:16px;height:16px;" border="0"></td> <td class="instruction">-> Setare ca nepublicate </td> ';
 echo '<tr><td width="20"><img src="images/preview.gif" style="width:16px;height:16px;" border="0"></td> <td class="instruction">-> Vizualizare pagina cu articole </td> ';
 echo '<tr><td width="20"><img alt="Modificare" src="images/mod.gif" style="width:16px;height:16px;" border="0"></td> <td class="instruction">-> Modifica pagina </td> ';
 echo '<tr><td width="20"><img alt="Stergere" src="images/del.gif" style="width:16px;height:16px;" border="0"></td> <td class="instruction">-> Sterge pagina </td> ';
 echo '</table>'; 
echo'</fieldset></td></tr>';

?>