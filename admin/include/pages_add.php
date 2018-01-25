<?php
$id_ordon = $o_db->GetOne('select max(ordon) from page');
$id_ordon++;

echo '<tr><td class="titlu"><a href="index.php?page=pages" class="calea">Gestionare pagini</a>&nbsp;>&nbsp;Adaugare</td></tr>';
echo'<tr><td><form method="post" action="submit.php" onsubmit="return validate_form([[\'title\',\'required\',\'Titlu\']]);"><input type="hidden" name="page" value="pages"><input type="hidden" name="action" value="add">';
echo '<table border="0" width="100%" cellspacing="1" cellpadding="2">';
echo '<tr><td style="width:150px;">Titlu: *</td>';
echo '<td><input type="text" class="textfield" name="title" id="title"></td>';
echo '</tr>';
echo '<td>Descriere:</td>';
echo '<td><textarea name="description" id="description"></textarea></td>';
echo '</tr>';
echo '<tr><td>Cuvinte cheie:</td>';
echo '<td class="comment"><input type="text" class="textfield" name="keywords" id="keywords">&nbsp(separate prin virgula)</td>';
echo '</tr>';
echo '<tr><td colspan="2">Continut:</td></tr>';
echo '<tr><td colspan="2">'.getEditor('textarea','').'</td></tr>';
echo '<tr>';
echo '<td>Ordonare:</td>';
echo '<td><input type="text" class="stextfield" name="ordon" id="ordon" value="'.$id_ordon.'"></td>';
echo '</tr>';
echo '<tr>';
echo '<td>Publicare:</td>';
echo '<td><input type="checkbox" name="publish" id="ordon" value="1" checked></td>';
echo '</tr>';
echo '<tr><td><input type="Submit" value="Adauga" class="button"></td></tr></table>';
echo '</form></tr></td>';
?>