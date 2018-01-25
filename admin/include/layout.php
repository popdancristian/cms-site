<?php
$a_layout = $o_db->getAll('select * from layout');
echo '<tr><td class="titlu">Aspect</td></tr>';	
echo '<table border="0"  cellspacing="2" cellpadding="10"><tr>';
for ($i=0;$i<count($a_layout);$i++) 
{
 $str_color = '#FFFFFF';
 if ($a_layout[$i]['active'] == 1) $str_color = '#8CC7E7';
 echo '<td align="center" style="background-color:'.$str_color.';"><a href="submit.php?page=layout&layoutid='.$a_layout[$i]['layoutid'].'&action=publish&value=1"><img src="'.URL_SITE.'/template/'.$a_layout[$i]['directory'].'/image.jpg" width="200" height="154" border="0"></a><br>'.$a_layout[$i]['title'].'</td>';
 }
echo '</tr></table>';
echo '</tr></td>';
?>