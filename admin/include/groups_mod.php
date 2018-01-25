<?php
if ($_GET['groupid'] == 1) error();

$a_module=$o_db->getAll('select * from module');
$group_select=$o_db->GetRow('select * from `group` where groupid='.$_GET['groupid']);
$a_group_module=$o_db->getCol('select moduleid from group_module where groupid='.$_GET['groupid']);

echo '<tr><td class="titlu"><a href="index.php?page=groups" class="calea">Gestionare Grupuri</a>&nbsp;>&nbsp;Modificare</td></tr>';
echo'<tr><td><form method="post" action="submit.php" onsubmit="return validate_form([[\'title\',\'required\',\'Nume\']]);"><input type="hidden" name="page" value="groups"><input type="hidden" name="action" value="update"><input type="hidden" name="groupid" value="'.$_GET['groupid'].'">';
echo '<table border="0" width="100%" cellspacing="1" cellpadding="2">';
echo '<tr><td style="width:150px;">Nume: *</td>';
echo '<td><input type="text" class="textfield" name="title" id="title" value="'.$group_select['title'].'"></td>';
echo '</tr>';
echo '<tr><td>Module:</td><td><select name="moduleid[]" size="10" multiple>';
for ($i=0;$i<count($a_module);$i++) 
{
 if (in_array($a_module[$i]['moduleid'],$a_group_module))
     echo'<option value='.$a_module[$i]['moduleid'].' selected>'.$a_module[$i]['title'].'</option>';
 else
    echo'<option value='.$a_module[$i]['moduleid'].'>'.$a_module[$i]['title'].'</option>';
}
echo'</select></td></tr>';
echo '<tr><td><input type="Submit" value="Actualizeaza" class="button"></td></tr></table>';
echo '</form></tr></td>';
?>