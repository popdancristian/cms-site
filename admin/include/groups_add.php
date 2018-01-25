<?php
$a_module=$o_db->getAll('select * from module');
echo '<tr><td class="titlu"><a href="index.php?page=groups" class="calea">Gestionare Grupuri</a>&nbsp;>&nbsp;Adaugare</td></tr>';
echo'<tr><td><form method="post"  action="submit.php" onsubmit="return validate_form([[\'title\',\'required\',\'Nume\']]);"><input type="hidden" name="page" value="groups"><input type="hidden" name="action" value="add">';
echo '<table border="0" width="100%" cellspacing="1" cellpadding="2">';
echo '<tr><td style="width:150px;">Nume: *</td>';
echo '<td><input type="text" class="textfield" name="title" id="title"></td>';
echo '</tr>';
echo '<tr><td>Module:</td><td><select name="moduleid[]" size="10" multiple class="select">';
for ($i=0;$i<count($a_module);$i++) 
echo'<option value='.$a_module[$i]['moduleid'].'>'.$a_module[$i]['title'].'</option>';
echo'</select></td></tr>';
echo '<tr><td><input type="Submit" value="Adauga" class="button"></td></tr></table>';
echo '</form></tr></td>';
?>