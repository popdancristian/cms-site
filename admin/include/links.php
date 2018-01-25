<?php
$a_link = $o_db->getAll('select * from link');
echo '<tr><td class="titlu">Gestionare legaturi</td></tr>';
if (count($a_link)>0)
{
    echo '<tr><td><table border="0" width="100%" class="tabel" cellspacing="1" cellpadding="2"><th class="th">Nume</th><th class="th">URL</th><th class="th">Modificare</th><th class="th">Stergere</th>';
    for ($i=0;$i<count($a_link);$i++) 
    {
        echo '<tr>';
        echo '<td class="td" width="60%">'.$a_link[$i]['title'].'</td>';
        echo '<td class="td">'.$a_link[$i]['url'].'</td>';
        echo '<td align="center" class="td"><a href="index.php?page=links&action=mod&linkid='.$a_link[$i]['linkid'].'" title="Modificare"><img alt="Modificare" src="images/mod.gif" border="0"></a></td>';
        echo '<td align="center" class="td"><a href="submit.php?page=links&linkid='.$a_link[$i]['linkid'].'&action=delete" onclick="return confirm(\'Sunteti sigur ca doriti sa stergeti?\');" title="Stergere"><img alt="Stergere" src="images/del.gif" style="width:16px;height:16px;" border="0"></a></td></tr>';
        
    }
    echo '</table></td></tr>';
}
else echo '<tr><td align="center" height="30">Nu exista legaturi.</td></tr>';

echo '<tr><td><input type="button" class="buttonad" value="Adauga Legatura" onclick="location.href=\'index.php?page=links&action=add\';" ></td></tr>';

echo '</form></tr></td>';
?>