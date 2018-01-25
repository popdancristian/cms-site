<?php
$str_sql = "select a.*,c.title as category,u.username
			from article a
			left join category c on a.categoryid = c.categoryid
            left join user u on a.userid = u.userid";

if (!empty($_GET['search'])) $str_sql.=" where a.categoryid='".$_GET['search']."'";
$a_article = $o_db->getAll($str_sql);
			
echo '<tr><td class="titlu">Gestionare articole</td></tr>';
echo '<tr><td><table border="0" width="100%" class="tabel" cellspacing="1" cellpadding="2"><th class="th">Titlu</th><th class="th">Utilizator</th><th class="th">Data</th><th class="th">Categoria</th><th class="th">Publicare</th><th class="th">Modificare</th><th class="th">Stergere</th></tr>';
for ($i=0;$i<count($a_article);$i++) 
{
	echo '<tr><td class="td" width="40%">'.$a_article[$i]['title'].'</td>';
    echo '<td class="td" width="100">'.$a_article[$i]['username'].'</td>';
	echo '<td class="td">'.$a_article[$i]['dateadd'].'</td>';
	echo '<td class="td">'.$a_article[$i]['category'].'</td>';
	if ($a_article[$i]['publish']=="1") echo '<td class="td" align="center"><a href="submit.php?page=articles&articleid='.$a_article[$i]['articleid'].'&action=publish&value=0"><img src="images/on.gif" style="width:16px;height:16px;" border="0"></td>';
	else  echo '<td class="td" align="center"><a href="submit.php?page=articles&articleid='.$a_article[$i]['articleid'].'&action=publish&value=1"><img src="images/off.gif" style="width:16px;height:16px;" border="0"></a></td>';
	
	echo '<td align="center" class="td"><a href="index.php?page=articles&action=mod&articleid='.$a_article[$i]['articleid'].'" title="Modificare"><img alt="Modificare" src="images/mod.gif" border="0" ></a></td>';
	echo '<td align="center" class="td"><a href="submit.php?page=articles&articleid='.$a_article[$i]['articleid'].'&action=delete" onclick="return confirm(\'Sunteti sigur ca doriti sa stergeti?\');" title="Stergere"><img alt="Stergere" src="images/del.gif" style="width:16px;height:16px;" border="0"></a></td>';
		
}
echo '</table></td></tr>';
echo '<tr><td><input type="button" class="buttonad" value="Adauga Articol" onclick="location.href=\'index.php?page=articles&action=add\';"></td></tr>';

echo'<tr><td> <fieldset class="ifieldset">	';
echo'<legend class="ilegend">Legenda</legend>'; 
 echo '<table  border="0"  cellspacing="1" cellpadding="1">';
 echo '<tr><td width="20"><img src="images/on.gif" style="width:16px;height:16px;" border="0"></td> <td class="instruction">-> Setare ca publicate </td> ';
  echo '<tr><td width="20"><img src="images/off.gif" style="width:16px;height:16px;" border="0"></td> <td class="instruction">-> Setare ca nepublicate </td> ';
 echo '<tr><td width="20"><img alt="Modificare" src="images/mod.gif" style="width:16px;height:16px;" border="0"></td> <td class="instruction">-> Modifica articol </td> ';
 echo '<tr><td width="20"><img alt="Stergere" src="images/del.gif" style="width:16px;height:16px;" border="0"></td> <td class="instruction">-> Sterge articol </td> ';
 echo '</table>'; 
echo'</fieldset></td></tr>';
?>