<?php
$a_module = $o_db->getAll('select *
						 from module 
						 order by ordon');

echo '<tr><td class="titlu">Gestionare module</td></tr>';
echo '<tr><td><table border="0" width="100%" class="tabel" cellspacing="1" cellpadding="2"><th class="th">Titlu</th><th class="th">Tip</th><th class="th">Activare</th>';
for ($i=0;$i<count($a_module);$i++) 
{
	echo '<tr><td class="td" width="50%">'.$a_module[$i]['title'].'</td>';
    echo '<td class="td" width="50%">'.$a_module[$i]['type'].'</td>';
	
    if ($a_module[$i]['type']=="standard")
    {
        echo '<td class="td" align="center"><a href="#" title="Activare" onclick="alert(\'Modulele standard nu pot fi dezactivate!\');"><img src="images/on.gif" style="width:16px;height:16px;" border="0" alt="Activare"></td>';
    }
    else
    {
        if ($a_module[$i]['active']=="1") echo '<td class="td" align="center"><a href="submit.php?page=modules&moduleid='.$a_module[$i]['moduleid'].'&action=active&value=0" title="Activare"><img src="images/on.gif" style="width:16px;height:16px;" border="0" alt="Activare"></td>';
        else  echo '<td class="td" align="center"><a href="submit.php?page=modules&moduleid='.$a_module[$i]['moduleid'].'&action=active&value=1" title="Activare"><img src="images/off.gif" style="width:16px;height:16px;" border="0" alt="Activare"></a></td>';
    }
}
echo '</table></td></tr>';
?>