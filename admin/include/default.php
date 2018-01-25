<?php
echo '<tr><td class="titlu">Panou de control</td></tr>';
echo '<tr><td><table align="center" border="0" cellspacing="4" cellpadding="5" width="100%"><tr>';
$i=0;
foreach ($a_module as $str_key=>$a_value)
{ 
 echo '<td align="center"><a href="index.php?page='.$str_key.'" title="'.$a_value['title'].'"><img src="images/'.$str_key.'.gif" border="0" style="width:55px;height:41px;" alt="'.$a_value['title'].'"><br>'.$a_value['title'].'</a></td>';
 $i++;
 if ($i % 5 == 0) echo '</tr><tr>';
}
echo '</tr></table></td></tr>'; 
?>