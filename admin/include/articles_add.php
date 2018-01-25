<?php
$a_category = $o_db->getAll('select * from category order by ordon');

echo '<tr><td class="titlu"><a href="index.php?page=articles" class="calea">Gestionare Articole</a>&nbsp;>&nbsp;Adaugare</td></tr>';
echo'<tr><td><form method="post" action="submit.php" onsubmit="return validate_form([[\'title\',\'required\',\'Titlu\']]);">';
echo '<table border="0" width="100%" cellspacing="1" cellpadding="2"><input type="hidden" name="page" value="articles"><input type="hidden" name="action" value="add">';
echo '<tr><td>Categoria:</td><td><select name="categoryid">';
for ($i=0;$i<count($a_category);$i++) 
echo'<option value='.$a_category[$i]['categoryid'].'>'.$a_category[$i]['title'].'</option>';
echo'</select></td></tr>';
echo '<tr><td style="width:150px;">Titlu: *</td><td><input type="text" class="textfield" name="title" id="title"></td></tr>';
echo'<tr><td>Descriere:</td><td><textarea rows="2" cols="20" name="description"></textarea></td></tr>';
echo '<tr><td>Cuvinte cheie:</td>';
echo '<td class="comment"><input type="text" class="textfield" name="keywords" id="keywords">&nbsp(separate prin virgula)</td>';
echo '</tr>';

echo'<tr><td colspan="2">Continut</td></tr><tr><td colspan="2">'. getEditor('textarea','').'</td></tr>';			
echo '<tr><td><input type="Submit" value="Adauga" class="button"></td></tr>';
echo '</form></tr></td>';

?>